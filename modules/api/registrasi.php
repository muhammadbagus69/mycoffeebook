<?php

pr('aaaa');die();

$username 		=	$_GET['username'];
$password 		= $_GET['password'];
$nama					= $_GET['nama'];
$alamat				= $_GET['alamat'];
$level				= 0;

if (!empty($username) && !empty($password)) 
{
	$query 				= $db->Execute("INSERT INTO user VALUES ('','$username','$password','$nama','$alamat','-','0')");
		if ($query) 
		{
			$user 	= $db->getRow("SELECT * FROM user WHERE username = '$username'"); 
		}
		if (!$query) 
		{
			$user 	= "Pendaftaran Gagal";
		}
	api_ok($user);
}else{
	api_no("Masukkan Data Anda")
}