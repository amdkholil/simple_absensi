<?php

$host	="localhost";
$user	="root";
$pwd	="";
$db		="absensi";

$mysqli=new mysqli($host,$user,$pwd,$db) or die("koneksi gagal");

$jm_masuk	= "07:30:00";	//jam masuk kerja
$jm_keluar	= "16:30:00";	//jam pulang kerja

?>