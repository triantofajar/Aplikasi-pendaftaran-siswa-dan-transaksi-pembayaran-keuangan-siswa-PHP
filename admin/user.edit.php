<?php
if(isset($_GET['id_user'])){
		$id_user=$_GET['id_user'];
       // $TUser=$_GET['TUser'];
	
    $query = "SELECT TUser, nama FROM tbl_user WHERE id_user = '$id_user'";
    $hasil = mysql_query($query) or die(mysql_error());
    $data = mysql_fetch_array($hasil);	


	}

?>


<div id="main"> <a name="TemplateInfo"></a>
<!DOCTYPE html>
<html>
	<head>
	<title>Edit User</title>
	</head>

	<body>
	<?php
	include('../config/koneksi.php');

	//cek dahulu, jika tombol simpan di klik
	if(isset($_POST['btnSimpan'])){
		//$id				=  $_POST['id_user'];
		$nama			=	$_POST['nama'];
		$TUser			=	$_POST['TUser'];
		$TPass			=	md5($_POST['TPass']);
		
		
			
		// SQL Simpan data ke tabel database
			$update	= mysql_query("UPDATE tbl_user SET TUser='$TUser',TPass='$TPass', nama='$nama' WHERE id_user='$id_user'");
			if($update){
				?>
				<blockquote>
				  <p></p>
				  <p>Data Anda berhasil diubah...</p>
				  <p></p>
				</blockquote>
				<?php
				echo "<meta http-equiv='refresh' content='1; url=admin.php?page=user.view'>";
					
					
				?>	
				<?php
			}
			exit;
		
	} // Penutup POST
			
	

	?>

		<form action="" method="POST" name="post" enctype="multipart/form-data" target="_self">
			
			<table class="table-list" width="100%" border="0" cellpadding="3" cellspacing="1">
				<tr>
					<td colspan="3" bgcolor="#F5F5F5"><b>Edit User</b></td>
				</tr>

				<tr>
					<td>Nama User</td>
					<td>&nbsp;</td>
					<td><input type="text" name="nama" class = "form-control" value="<?php echo $data['nama']; ?>" size="50" maxlength="100"></td>
				</tr>
                <tr>
					<td>Username</td>
					<td>&nbsp;</td>
					<td><input type="text" name="TUser" class = "form-control" value="<?php echo $data['TUser']; ?>" size="50" maxlength="100"></td>
				</tr>

				<tr>
					<td>Password</td>
					<td>&nbsp;</td>
					<td><input type="password" name="TPass" class = "form-control" value="" size="50" maxlength="100"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><input name="btnSimpan" type="submit" value=" Simpan " class="btn btn-info btn-primary"></td>
				</tr>	
			</table>
		</form>
	</body>
</html>
</div>