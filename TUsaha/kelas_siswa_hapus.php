<div id="main"> <a name="TemplateInfo"></a>
<?php
if(isset($_GET['id'])){
	include "../config/koneksi.php";
	
	$id = $_GET['id'];
	$id_utama = $_GET['id_utama'];
	$cek = mysql_query("SELECT id_siswa FROM kelas_siswa WHERE id_siswa='$id'") or die(mysql_error());
	
	if(mysql_num_rows($cek) == 0){
		echo '<script>window.history.back()</script>';
	}else{
		$del = mysql_query("DELETE FROM kelas_siswa WHERE id_siswa='$id'");
		$del2 = mysql_query("DELETE FROM biodata WHERE id_utama='$id_utama'");
		
		if($del){
			echo '<script>window.history.back()</script>';
		}else{
			echo '<div class="alert alert-danger" role="alert"><strong>Oh!</strong>Gagal Menghapus Data.</div>';	
		}
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
</div>