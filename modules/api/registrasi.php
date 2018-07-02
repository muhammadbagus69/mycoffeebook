<?php

// pr('aaaa');die();

$username 		=	$_GET['username'];
$password 		= $_GET['password'];
$namalengkap	= $_GET['namalengkap'];
$alamat				= $_GET['alamat'];
$level				= 0;

$query 				= $db->Execute("INSERT INTO user VALUES ('','$username','$password','$namalengkap','$alamat','-','0')");

if ($query) {
	$user 	= $db->getRow("SELECT * FROM user WHERE username = '$username'"); 
}
if (!$query) {
	$user 	= "Pendaftaran Gagal";
}
api_ok($user);