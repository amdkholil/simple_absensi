<?php
include "lib/config.php";

?>


		<ul class="breadcrumb">
			<li><a href="menu.php?nav=absen-admin&menu=masuk">Absen Masuk</a></li>
			<li><a href="menu.php?nav=absen-admin&menu=keluar">Absen Keluar</a></li>
			<li><a href="menu.php?nav=absen-admin&menu=ta">Tidak Absen</a></li>
		</ul>



<?php
$perpage= 5;  //jumlah content perhalaman.
if (isset($_GET['p'])) {
	$page=$_GET['p'];
}
else{
	$page=1;
}




//------------------------------------------------------------------------------------------------------------------------
//------------------------------ absen masuk -----------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------
if (isset($_GET['menu']) AND 	$_GET['menu']=="masuk")
{
	?>
	<table class="table table-hover">
		<h4>Absensi Masuk</h4>
		<tr>
			<th>Tanggal Abasen</th>
			<th>Nama Karyawan</th>
			<th>Jam Masuk</th>
			<th>Status</th>
			<th>Tindakan</th>
		</tr>
	<?php
	$hal	= ($page-1)*$perpage;
	$query=$mysqli->query("SELECT user.username, absensi.id_absen, absensi.tanggal, absensi.jm_masuk, absensi.st_masuk from user, absensi WHERE absensi.id_user=user.id_user and absensi.st_masuk='Pending' order by absensi.tanggal DESC limit $hal,$perpage");
	while ($data=$query->fetch_assoc()) 
	{
		echo "<tr>";
		echo "<td>$data[tanggal]</td>";
		echo "<td>$data[username]</td>";
		echo "<td>$data[jm_masuk]</td>";
		echo "<td>$data[st_masuk]</td>";
		echo "<td>";
		echo "<a href='lib/proses.php?act=approvem&id=$data[id_absen]' class='btn btn-primary btn-sm'>Approve</a> &nbsp;";
		echo "<a href='lin/proses.php?act=rejectm&id=$data[id_absen]' class='btn btn-danger btn-sm'>Reject</a></td>";
		echo "</tr>";
	}

	?>
	</table>
	  <ul class="pagination pagination-sm">
		<?php
		//paging
		$query=$mysqli->query("SELECT * from absensi WHERE st_masuk='Pending'");
		$tot_rows=mysqli_num_rows($query);
		$tot_hal=ceil($tot_rows/$perpage);
		for ($i=1; $i <= $tot_hal; $i++)
		{
	    	echo "<li><a href='menu.php?nav=absen-admin&menu=$_GET[menu]&p=$i'> $i </a></li>";
		}
	echo "</ul>";
}
//-----------------------------------------------------------------------------------------------------------------------
//-------------------------  absen keluar -------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------

if (isset($_GET['menu']) AND $_GET['menu']=="keluar") 
{
	?>
	<table class="table table-hover">
		<h4>Absensi Keluar
		<tr>
			<th>Tanggal Abasen</th>
			<th>Nama Karyawan</th>
			<th>Jam Keluar</th>
			<th>Status</th>
			<th>Tindakan</th>
		</tr>
	<?php
	  $hal	= ($page-1)*$perpage;
	$query=$mysqli->query("SELECT user.username, absensi.id_absen, absensi.tanggal, absensi.jm_keluar, absensi.st_keluar from user, absensi WHERE absensi.id_user=user.id_user and absensi.st_keluar='Pending' order by absensi.tanggal DESC limit $hal,$perpage");
	while ($data=$query->fetch_assoc()) 
	{
		echo "<tr>";
		echo "<td>$data[tanggal]</td>";
		echo "<td>$data[username]</td>";
		echo "<td>$data[jm_keluar]</td>";
		echo "<td>$data[st_keluar]</td>";
		echo "<td>";
		echo "<a href='lib/proses.php?act=approvek&id=$data[id_absen]' class='btn btn-primary btn-sm'>Approve</a> &nbsp;";
		echo "<a href='lin/proses.php?act=rejectk&id=$data[id_absen]' class='btn btn-danger btn-sm'>Reject</a></td>";
		echo "</tr>";
	}
	?>
	</table>
	  <ul class="pagination pagination-sm">
		<?php
		//paging
		$query=$mysqli->query("SELECT * from absensi WHERE st_keluar='Pending'");
		$tot_rows=mysqli_num_rows($query);
		$tot_hal=ceil($tot_rows/$perpage);
		for ($i=1; $i <= $tot_hal; $i++)
		{
	    	echo "<li><a href='menu.php?nav=absen-admin&menu=$_GET[menu]&p=$i'> $i </a></li>";
		}
		echo "</ul>";
}

//------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------tidak absen------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------

if (isset($_GET['menu']) AND $_GET['menu']=="ta") 
{
	?>
	<table class="table table-hover">
		<h4>Tidak Absen</h4>
		<tr>
			<th>Tanggal Abasen</th>
			<th>Nama Karyawan</th>
			<th>Jam Masuk</th>
			<th>Jam Keluar</th>
			<th>Tindakan</th>
		</tr>
	<?php
	$hal	= ($page-1)*$perpage;
	$query=$mysqli->query("SELECT user.username, absensi.id_absen, absensi.tanggal, absensi.jm_keluar, absensi.jm_masuk from user, absensi WHERE absensi.id_user=user.id_user and absensi.st_keluar='' order by absensi.tanggal DESC limit $hal,$perpage");
	while ($data=$query->fetch_assoc()) 
	{
		echo "<tr>";
		echo "<td>$data[tanggal]</td>";
		echo "<td>$data[username]</td>";
		echo "<td>$data[jm_masuk]</td>";
		echo "<td>$data[jm_keluar]</td>";
		echo "<td>";
		echo "<a href='lib/proses.php?act=approveta&id=$data[id_absen]' class='btn btn-primary btn-sm'>Approve</a> &nbsp;";
		echo "<a href='lin/proses.php?act=rejectta&id=$data[id_absen]' class='btn btn-danger btn-sm'>Reject</a></td>";
		echo "</tr>";
	}
	?>
	</table>
	  <ul class="pagination pagination-sm">
		<?php
		//paging
		$query=$mysqli->query("SELECT * from absensi WHERE st_keluar='Pending'");
		$tot_rows=mysqli_num_rows($query);
		$tot_hal=ceil($tot_rows/$perpage);
		for ($i=1; $i <= $tot_hal; $i++)
		{
	    	echo "<li><a href='menu.php?nav=absen-admin&menu=$_GET[menu]&p=$i'> $i </a></li>";
		}
	echo "</ul";
}
	?>