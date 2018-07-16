<?php

$id = $_GET['id'];
$ok = 0;
$msg = '';
$detail = array();

if (!empty($id)) 
{
	$getID = $db->getRow("SELECT * FROM resep WHERE id_kategori='$id'");
	if ($getID) 
	{
		$getID['image'] = img_show($getID['image']);
    $detail = $getID;
    $ok = 1;
    $msg = 'Success' ;
	}else{
		$msg = "Resep Kosong";
	}
}else{
	$msg = "Failed to access";
}


api_ok(
	array(
			'ok'			=> $ok,
			'message' => $msg,
			'resep'		=> $detail
		)
	);
