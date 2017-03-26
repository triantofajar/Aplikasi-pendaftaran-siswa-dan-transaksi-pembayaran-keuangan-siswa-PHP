<div id="main"> <a name="TemplateInfo"></a>
<?php
if(isset($_GET['id'])){
	include "../config/koneksi.php";
	
	$id = $_GET['id'];
	$cek = mysql_query("SELECT id_trans FROM tbl_transaksi WHERE id_trans='$id'") or die(mysql_error());
	
	if(mysql_num_rows($cek) == 0){
		echo '<script>window.history.back()</script>';
	}else{
		$del = mysql_query("DELETE FROM tbl_transaksi WHERE id_trans='$id'");
		
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