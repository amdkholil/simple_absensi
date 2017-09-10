<?php
session_start();
include 'config.php';

	$username=$_POST["nama"];
	$password=$_POST["sandi"];

	$query="select * from user where username='$username' and password='$password'";
	$result=$mysqli->query($query);
	if($result->num_rows > 0)
	{
		$row=$result->fetch_assoc();
		
		$_SESSION['username']	= $row["username"];
		$_SESSION['level']		= $row["level"];
		header('Location: ../menu.php');
	}
	else
	{
		header('Location: ../index.php');
	}