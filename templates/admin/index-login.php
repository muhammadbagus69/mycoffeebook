<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login Admin</title>

		<!-- Bootstrap CSS -->
		<link href="<?php echo _URL?>templates/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<h1 class="text-center">Login</h1>

		<?php
		if (!empty($_POST['username']))
		{
			$username = $_POST['username'];
			$password = @$_POST['password'];

			// header('Location:');
			if ($username == '' && $password == '') {
			    echo "<script>alert('Silahkan isikan username dan password')</script>";
			  }else{
			  $query = $db->getRow("SELECT `username`,`password` FROM user WHERE username = '$username' AND password = '$password'");  
				  if ($password == $query['password'] && $username == $query['username'])
				  {
						$_SESSION['admin_id'] = 1;
			      echo "<script>alert('Login Berhasil')</script>";
						header('Location:'._URL.'admin/');
				  }else{
			      echo "<script>alert('Login GAGAL...!!!')</script>";
						header('Location:');
				  }
			  }
		}
		?>
		<div class="container-fluid">
			<div class="panel panel-default">
				<div class="panel-body">
					<form action="" method="POST" role="form">
						<div class="form-group">
							<label for="">Username</label>
							<input type="text" name="username" class="form-control" placeholder="Username">
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" name="password" class="form-control" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-primary">Login</button>
					</form>
				</div>
			</div>
		</div>

		<!-- Bootstrap JavaScript & Jquery -->
		<script src="<?php echo _URL?>templates/admin/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>