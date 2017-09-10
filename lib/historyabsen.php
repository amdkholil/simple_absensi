<?php
include "lib/config.php";

$perpage= 10;  //jumlah content perhalaman.
if (isset($_GET['hal'])) {
	$page=$_GET['hal'];
}
else{
	$page=1;
}
$hal	= ($page-1)*$perpage;

?>
	<table class="table table-hover">
		<tr>
			<th>Tanggal</th>
			<th>Nama User</th>
			<th>Jam Masuk</th>
			<th>Status</th>
			<th>Jam Keluar</th>
			<th>Status</th>
		</tr>
<?php
$query	= $mysqli->query("select * from absensi, user where absensi.id_user=user.id_user and user.level='user' order by absensi.tanggal desc limit $hal,$perpage");
while ($data=$query->fetch_assoc()) 
{
	?>
		<tr>
			<td><?php echo $data['tanggal']; ?></td>
			<td><?php echo $data['username']; ?></td>
			<td><?php echo $data['jm_masuk']; ?></td>
			<td><?php echo $data['st_masuk']; ?></td>
			<td><?php echo $data['jm_keluar']; ?></td>
			<td><?php echo $data['st_keluar']; ?></td>
		</tr>
	<?php
}
?>
	</table>

	<nav aria-label="Page navigation">
  <ul class="pagination">
	<?php
	//paging
	$query2	= $mysqli->query("select count(id_absen) as total from absensi, user where absensi.id_user=user.id_user and user.level='user'");
	$tot_rows= $query2->fetch_assoc();
	$tot_hal=ceil($tot_rows['total']/$perpage);

	for ($i=1; $i <= $tot_hal; $i++)
	{
    	echo "<li><a href='menu.php?nav=history-user&hal=$i'> $i </a></li>";
	}
	?>
  </ul>
</nav>