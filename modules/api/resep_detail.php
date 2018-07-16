<?php 

$id = $_GET['id'];
$ok = 0;
$msg = '';
$resep = array();

$query = $db->getRow("SELECT * FROM resep WHERE id='$id'");

if ($query) 
{
	$query['image'] = img_show($query['image']);

	$user = $db->getRow("SELECT * FROM user WHERE id={$query['id_user']}");
	$user['foto'] = img_show($user['foto']);
  
	$tampil_k = $db->getAll("SELECT 
																`kriteria`.`kriteria`,
																`subkriteria`.`subkriteria` 
															FROM 
																`kriteria`
															LEFT JOIN 
																subkriteria 
															ON 
																`kriteria`.`id` = `subkriteria`.`id_kriteria` 
															LEFT JOIN 
																komposisi 
															ON 
																`subkriteria`.`id` = `komposisi`.`id_subkriteria` 
															WHERE 
																`komposisi`.`id_resep` = '{$id}'");

	$how_tomake = $db->getAll("SELECT urutan,cara FROM pembuatan WHERE id_resep = '$id' ORDER BY urutan ASC");

  $ok = 1;
  $msg = 'Success' ;
}else{
	$msg = 'Resep Tidak Ditemukan';
}

api_ok(
	array(
			'ok'			=> $ok,
			'message' => $msg,
			'resep'		=> $query,
			'user'		=> $user,
			'bahan'		=> $tampil_k,
			'cara'		=> $how_tomake
		)
	);