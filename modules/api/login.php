<?php  
$username = @$_POST['username'];
$password = @$_POST['password'];

if (!empty($username) && !empty($username))
{
  $query     = $db->getRow("SELECT username,password FROM user WHERE username = '$username' AND password = '$password'");  

  if ($query) {
    $user   = $db->getRow("SELECT * FROM user WHERE username = '$username'"); 
  }
  if (!$query) {
    $user   = 'Akun tidak ditemukan';
  }
  api_ok($user);
}else{
  api_no('Masukkan username password');
}