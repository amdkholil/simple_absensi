<?php
include "lib/config.php";
$username=$_SESSION['username'];
$query=$mysqli->query("select * from user where username='$username'");
$user=$query->fetch_assoc();
$iduser=$user['id_user'];

if ($_SESSION['level']=="user")
{
	$user	= $_SESSION['username'];
	$tgl	= $mysqli->query("select * from absensi where id_user=$iduser order by tanggal desc limit 1");
	$data	= $tgl->fetch_assoc();

	if($data['tanggal']!=date('Y-m-d'))
	{
		?>
		<p>&nbsp;</p>
		<div class="alert alert-danger"><b>Silahkan Absen!</b>,anda belum melakukan <i>absen masuk</i>.</div>
		<form method="post" action="lib/proses.php">
			<input type="hidden" name="masuk" value="Pending">
			<input type="submit" value="Absen Masuk" class="btn btn-primary btn-md">
		</form>
	<?php
	}
	elseif($data['tanggal']==date('Y-m-d'))
	{
		?>
		<p>&nbsp;</p>
		<div class="alert alert-success"><b>Terima kasih!</b>, anda sudah melakukan <i>absen masuk</i>.</div>
		<?php
		if(date('h:i:s')>=$jm_keluar and $data['st_keluar']=="")
			{
				?>
				<div class="alert alert-danger"><b>Silahkan Absen!</b>, Anda belum melakuakn <i>absen keluar</i>.</div>
				<form method="post" action="lib/proses.php">
					<input type="hidden" name="keluar" value="<?php echo $data['id_absen']; ?>">
					<input type="submit" value="Absen Keluar" class="btn btn-primary btn-md">
				</form>
				<?php
			}
		elseif($data['st_keluar']=="Pending" or $data['st_keluar']=="Approved")
			{
				echo "<div class='alert alert-succes'><b>Terima kasih!</b>, anda sudah melakukan <i>absen keluar</i>.</div>";
			}
		else
		{
			echo  "<div class='alert alert-info'><b>Jam Keluar</b> = $jm_keluar</b>.</div>";
		}
	}
}
	?>