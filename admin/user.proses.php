
<?php
error_reporting(0);
if(isset($_POST['simpan'])){

	$id_user=$_POST['id_user'];
	$nama=$_POST['nama'];
	$TUser=$_POST['TUser'];
	$TPass=md5($_POST['TPass']);
	$level=$_POST['level'];
	
	
	$query=mysql_query("INSERT into tbl_user(id_user,nama, TUser, TPass,level) 
						values('$id_user','$nama','$TUser','$TPass','$level')") or die(mysql_error());
						
	if($query > 0){
		?>
		<blockquote>
				  <p></p>
				  <p>Data Anda berhasil disimpan...</p>
				  <p></p>
				</blockquote>
				
				<?php
		echo "<meta http-equiv='refresh' content='1; url=admin.php?page=user.view'>";	
	}else{
		echo "gagal simpan";
	}

}else{
	unset($_POST['simpan']);
}
?>
