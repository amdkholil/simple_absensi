<?php
include "lib/config.php";
$username=$_SESSION['username'];
$query=$mysqli->query("select * from user where username='$username'");
$user=$query->fetch_assoc();
$iduser=$user['id_user'];
$perpage= 10;  //jumlah content perhalaman.
if (isset($_GET['hal'])) {
	$page=$_GET['hal'];
}
else{
	$page=1;
}
$hal	= ($page-1)*$perpage;
?>
<h3>History Absen</h3>
<table class="table table-hover table-bordered">
	<tr>
		<th>Tanggal</th>
		<th>Jam Masuk</th>
		<th>Status</th>
		<th>Jam Keluar</th>
		<th>Status</th>
	</tr>
<?php
$query	= $mysqli->query("select * from absensi where id_user='$iduser' order by tanggal desc limit $hal,$perpage");
while($data	= $query->fetch_assoc())
{
?>
<tr>
	<td><?php echo $data['tanggal']; ?></td>
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
    <li>
      <a href="menu.php?nav=history-user&hal=<?php echo $page-1; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
	<?php
	//paging
	$query2	= $mysqli->query("select count(id_absen) as total from absensi where id_user='$iduser'");
	$tot_rows= $query2->fetch_assoc();
	$tot_hal=ceil($tot_rows['total']/$perpage);

	for ($i=1; $i <= $tot_hal; $i++)
	{
    	echo "<li><a href='menu.php?nav=history-user&hal=$i'> $i </a></li>";
	}
	?>
    <li>
      <a href="menu.php?nav=history-user&hal=<?php echo $page+1; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>