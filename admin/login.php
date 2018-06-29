<?php

if (!empty($_SESSION['user']['name'])) 
{
	echo "<script>window.location='"._URL."admin/index' </script>";
}

if (!empty($_POST)){
	$username = $_POST['username'];
  $password = $_POST['password'];

  if ($username == '' && $password == '') {
    echo "<script>alert('Silahkan isikan username dan password')</script>";
  }else{
  $query = $db->getRow("SELECT `username`,`password` FROM user WHERE username = '$username' AND password = '$password'");  
	  if ($password == $query['password'] && $username == $query['username'])
	  {
	  	$_SESSION['user']['name'] = $username;
	    echo "<script>window.location='"._URL."admin/main' </script>";
	      // header('location:'._URL."")

	      // $_SESSION['level'] = $data['level'];
	      // $_SESSION['username'] = $data['username'];
	      
	  }else{
	      echo "<script>alert('Login GAGAL...!!!')</script>";
	      echo "<script>window.location='"._URL."admin/login' </script>";
	  }
  }
	

	// $_SESSION['user']['name'] = 'sdfsfsd';
}
?>

	<div class="page-wrapper">
		<div class="page-content--bge5">
			<div class="container">
				<div class="login-wrap">
					<div class="login-content">
						<div class="login-logo">
							<a href="#">
								<img src="images/icon/ico.png" style="height: 150px;width: 150px" alt="CoolAdmin">
							</a>
						</div>
						<div class="login-form">
							<form action="" method="post">
								<div class="form-group">
									<label>Username</label>
									<input class="au-input au-input--full" type="text" name="username" placeholder="Username">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input class="au-input au-input--full" type="password" name="password" placeholder="Password">
								</div>
								<button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
