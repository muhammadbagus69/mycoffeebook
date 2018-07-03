<?php

// pr('aaaa');die();

$username 		=	$_POST['username'];
$password 		= $_POST['password'];
$nama					= $_POST['nama'];
$alamat				= $_POST['alamat'];
$level				= 0;


if (!empty($username) && !empty($username))
{
  $query     = $db->Execute("INSERT INTO user VALUES ('','$username','$password','$nama','$alamat','-','0')");  

  if ($query) {
    $user   = $db->getRow("SELECT * FROM user WHERE username = '$username'"); 
  }
  if (!$query) {
    $user   = 'Pendaftaran Gagal';
  }
  api_ok($user);
}else{
  api_no('Masukkan Data Anda');
}