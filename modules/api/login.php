<?php  
$username = @$_POST['username'];
$password = @$_POST['password'];
$ok = 0;
$msg = '';
$user = array();

if (!empty($username) && !empty($password))
{
  $query     = $db->getRow("SELECT username,nama,alamat,foto FROM user WHERE username = '$username' AND password = '$password'");  

  if ($query) {
  	$user = $query;
    $ok = 1;
    $msg = 'Success' ;
  }else{
    $msg   = 'Akun tidak ditemukan';
  }
}else{
  $msg = "Silahkan isikan username dan password anda!!";
}

api_ok(
	array(
			'ok'			=> $ok,
			'message' => $msg,
			'user'		=> $user
		)
	);
