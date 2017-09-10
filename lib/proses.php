<?php
session_start();
include "config.php";

$username=$_SESSION['username'];
$query=$mysqli->query("select * from user where username='$username'");
$user=$query->fetch_assoc();
$iduser=$user['id_user'];
$jam	= date('h:i:s');
$tgl	= date('Y-m-d');

if(isset($_POST['masuk']))
{
	$absen=$mysqli->query("insert into absensi values(null,'$iduser','$tgl','$jam','Pending','','')");
	header('Location: ../menu.php');
}
elseif (isset($_POST['keluar'])) 
{
	$idabsen=$_POST['keluar'];
	$mysqli->query("update absensi set jm_keluar='$jam', st_keluar='Pending' where id_absen=$idabsen");
	header('Location: ../menu.php');
}

if (isset($_GET['act'])) {
	if ($_GET['act']=="approvem") {
		$query=$mysqli->query("update absensi set st_masuk='Approved' where id_absen='$_GET[id]'");
		echo "<script> javascript:history.back(); </script>";
	}
	elseif($_GET['act']=="rejectm") {
		$query=$mysqli->query("update absensi set st_masuk='Reject' where id_absen='$_GET[id]'");
		echo "<script> javascript:history.back(); </script>";
	}
	elseif($_GET['act']=="approvek") {
		$query=$mysqli->query("update absensi set st_keluar='Approved' where id_absen='$_GET[id]'");
		echo "<script> javascript:history.back(); </script>";
	}
	elseif($_GET['act']=="rejectk") {
		$query=$mysqli->query("update absensi set st_keluar='Reject' where id_absen='$_GET[id]'");
		echo "<script> javascript:history.back(); </script>";
	}
	elseif($_GET['act']=="approveta") {
		$query=$mysqli->query("update absensi set st_masuk='Approved', st_keluar='Approved', where id_absen='$_GET[id]'");
		echo "<script> javascript:history.back(); </script>";
	}
	elseif($_GET['act']=="rejectta") {
		$query=$mysqli->query("update absensi set st_masuk='Reject', st_keluar='Reject', where id_absen='$_GET[id]'");
		echo "<script> javascript:history.back(); </script>";
	}
}


if (isset($_POST['new-user']))
{
	$username	= $_POST['username'];
	$password	= $_POST['password'];
	$email		= $_POST['email'];
	$level		= $_POST['level'];
	$query = $mysqli->query("insert into user values('','$username','$password','$email','$level')");
	echo "<script>alert('berhasil menambahkan user baru');</script>";
	header("Location: ../menu.php?nav=user-set&u=list");
}
elseif (isset($_POST['edit-user']))
{
	$username	= $_POST['username'];
	$password	= $_POST['password'];
	$email		= $_POST['email'];
	$level		= $_POST['level'];
	$id_user	= $_POST['id_user'];
	$query		= $mysqli->query("update user set username='$username', password='$password', email='$email', level='$level' where id_user=$id_user");
	echo "<script>alert('berhasil menambahkan user baru');</script>";
	header("Location: ../menu.php?nav=user-set&u=list");
}