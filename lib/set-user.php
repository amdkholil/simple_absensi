<?php
include 'lib/config.php';

?>
	<ul class="breadcrumb">
			<li><a href="menu.php?nav=user-set&u=list">Daftar User</a></li>
			<li><a href="menu.php?nav=user-set&u=set">Tambah User</a></li>
		</ul>
<?php
if(isset($_GET['u']) and $_GET['u']=="set")
{
	if (isset($_GET['edit']))
	{
		$query=$mysqli->query("select * from user where id_user=$_GET[edit]");
		$data=$query->fetch_assoc();
		$username= $data['username'];
		$password= $data['password'];
		$email 	= $data['email'];
		$level = $data['level'];
		$act = "edit-user";
	}
	else
	{
		$username="";
		$password="";
		$email="";
		$level="";
		$act ="new-user";
	}
	?>
	<form name="new-user" class="form-horizontal" method="POST" action="lib/proses.php">
		<div class="form-group">
			<label class="col-sm-2 control-label">Username</label>
			<div class="col-sm-8">
				<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>";" required>
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-8">
				<input type="password" name="password" class="form-control" placeholder="********" value="<?php echo $password; ?>" required>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-8">
				<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Level</label>
			<div class="col-sm-8">
				<select name="level" class="form-control" required>
					<option>-- Level --</option>
					<option selected value="user">User</option>
					<option value="admin">Administrator</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"></label>
			<div class="col-sm-8">
				<input type="hidden" name="id_user" value="<?php echo $_GET['edit']; ?>">
				<input type="submit" name="<?php echo $act; ?>" class="btn btn-md btn-primary">
				<input type="reset" class="btn btn-md btn-default">
			</div>
		</div>

	</form>
	<?php
}
if(isset($_GET['u']) and $_GET['u']=="list")
{
	$perpage= 6;  //jumlah content perhalaman.
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
			<th>Username</th>
			<th>Password</th>
			<th>E-mail</th>
			<th>Level</th>
			<th>Opsi</th>
		</tr>
		<?php
		$query = $mysqli->query("select * from User order by username asc limit $hal,$perpage");
		while ($data = $query->fetch_assoc()) 
		{
			?>
			<tr>
				<td><?php echo $data['username']; ?></td>
				<td>********</td>
				<td><?php echo $data['email']; ?></td>
				<td><?php echo $data['level']; ?></td>
				<td>
					<a href="menu.php?nav=user-set&u=set&edit=<?php echo $data['id_user']; ?>" class="btn btn-primary btn-sm">Edit</a> &nbsp;
					<a href="#" class="btn btn-danger btn-sm">Hapus</a>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
		<nav aria-label="Page navigation">
		  <ul class="pagination">
			<?php
			//paging
			$query2	= $mysqli->query("select count(id_user) as total from user");
			$tot_rows= $query2->fetch_assoc();
			$tot_hal=ceil($tot_rows['total']/$perpage);

			for ($i=1; $i <= $tot_hal; $i++)
			{
		    	echo "<li><a href='menu.php?nav=$_GET[nav]&u=list&hal=$i'> $i </a></li>";
			}
			?>
		  </ul>
		</nav>
	<?php
}
?>