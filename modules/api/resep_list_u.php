<?php 

	$id = $_GET['id'];

	$getID = $db->getRow("SELECT * FROM resep WHERE id_user='$id'");

	if ($getID) 
	{
		$getID['image'] = img_show($getID['image']);
	}

api_ok($getID);