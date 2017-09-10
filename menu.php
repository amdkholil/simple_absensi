<?php
session_start();

if(!isset($_SESSION['username'])){
	header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-min.css">
	<link rel="stylesheet" type="text/css" href="style/default.css">
	<title>Sistem Absensi Karyawan</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row m-head">
			<div class="col-md-12" id="header"><h3>Sistem Absensi Karyawan</h3></div>
		</div>
		<div class="row m-cont">
			<div class="col-md-2 m-nav">
				<div class="row">
				<div class="inf">
					<table>
						<tr>
							<td rowspan="2"><img src="img/user.png"/></td>
							<td><b><?php echo strtoupper($_SESSION['level'])." / ".$_SESSION['username']; ?></b></td>
						</tr>
						<tr>
							<td><?php echo date('d-m-Y h:i') ?></td>
							</td>
						</tr>
					</table>							
				</div>
				</div>
				<div class="row">
					<ul class="nav-ul">
						<?php
							if ($_SESSION['level']=="admin") {
								?>
								<li><a href="menu.php?nav=absen-admin">Absensi</a></li>
								<li><a href="menu.php?nav=history-user">History Absensi</a></li>
								<li><a href="menu.php?nav=user-set">Pengaturan User</a></li>
						<?php		
							}
							elseif ($_SESSION['level']=="user") {
								?>
								<li><a href="menu.php?nav=absen-user">Absensi</a></li>
								<li><a href="menu.php?nav=history-user">History Absen</a></li>
						<?php
							}
						?>
						<li><a href="lib/logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-10 m-content">
				<?php
				if (isset($_GET['nav']))
				{
					switch ($_GET['nav']) {
						case 'absen-user':
							include "lib/a-user.php";
							break;
						case 'history-user':
								if ($_SESSION['level']=="user") 
								{
									include "lib/historyuser.php";
								}
								elseif($_SESSION['level']=="admin")
								{
									include "lib/historyabsen.php";
								}
							
							break;
						case 'absen-admin':
							include "lib/a-admin.php";
							break;
						case 'user-set':
							include 'lib/set-user.php';
							break;
					}
				}
				else
				{
					switch ($_SESSION['level']) {
						case 'user':
							include 'lib/a-user.php';
							break;
						case 'admin':
							include 'lib/a-admin.php';
							break;
					}
				}
				?>
			</div>
		</div>
		<div class="row m-foot">
			<div class="col-md-12">
				Copyright by <a href="http://fb.me/amd.kholil">Kholil</a>  &copy; 2017
			</div>
		</div>
	</div>
</body>
</html>