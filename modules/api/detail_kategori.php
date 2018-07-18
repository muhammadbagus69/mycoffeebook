<?php

$id = $_GET['id'];
$ok = 0;
$msg = '';
$resep = array();

if (!empty($id)) 
{
	$query = $db->getAll("SELECT * FROM `resep` WHERE `id_kategori`='$id' AND `status`= 1");
	
	foreach ($query as $key => $value) 
	{
		$query[$key]['image'] = img_show($value['image']);
		$query[$key]['selected'] = 0;
	}

	if ($query) 
	{
		$resep = $query;
	  $ok = 1;
	  $msg = 'Success' ;
	}else{
		$msg = 'Resep Kosong';
	}

}else{
	$msg = "Failed to access";
}


api_ok(
	array(
			'ok'			=> $ok,
			'message' => $msg,
			'resep'		=> $resep
		)
	);
