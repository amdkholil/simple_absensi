<?php
 session_start();
 if (isset($_SESSION['username'])) {
 	header('Location : menu.php');
 }
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-min.css"/>
		<link rel="stylesheet" type="text/css" href="style/login.css">
		<link rel="stylesheet" type="text/css" href="style/default.css">
		<title>Sistem Absensi Karyawan</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row m-head">
					<div class="col-md-12" id="header"><h3>Sistem Absensi Karyawan</h3></div>
			</div>
			<div class="row m-cont">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<p>&nbsp;<p>
					<div class="login-form">
						<h3 class="h-login" align="center">Selamat Datang</h3>
						<form action="lib/login.php" method="post">
							<div class="form-group">
								<input type="text" name="nama" class="form-control" placeholder="Username">
							</div>
							<div class="form-group">
								<input type="password" name="sandi" class="form-control" placeholder="********">
							</div>
							<div class="form-group">
								<center>
									<input type="submit" value="submit" class="btn btn-primary btn-md"	>
								</center>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
			<div class="row m-foot">
			<div class="col-md-12">
				Copyright by <a href="http://fb.me/amd.kholil">Kholil</a>  &copy; 2017
			</div>
		</div>
		</div>
	</body>
</html>