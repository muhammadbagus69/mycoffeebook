<?php 

	$id = $_GET['id'];
	$ok = 0;
	$msg = '';
	$detail = array();

	$getID = $db->getRow("SELECT * FROM resep WHERE id_user='$id'");

	if ($getID) 
	{
		$getID['image'] = img_show($getID['image']);

		$id_kat = $getID['id_kategori'];
		$kat = $db->getRow("SELECT * FROM kategori WHERE id='$id_kat'");
		$kat['image'] = img_show($kat['image']);

		$ok = 1;
	  $msg = 'Success' ;
	}

api_ok(
	array(
			'ok'				=> $ok,
			'message' 	=> $msg,
			'resep'			=> $getID,
			'kategori'	=> $kat,
		)
	);