<div id="main"> <a name="TemplateInfo"></a>
<?php
if(isset($_GET['id'])){
	include('../config/koneksi.php');
	
	$id = $_GET['id'];
	$cek = mysql_query("SELECT id_utama FROM biodata WHERE id_utama='$id'") or die(mysql_error());

	if(mysql_num_rows($cek) == 0){
		echo '<script>window.history.back()</script>';
	}
	else
	{
		$del = mysql_query("DELETE FROM biodata WHERE id_utama='$id'");

		
		if($del)      
		 {
		
		?>	
	<script type="text/javascript">
		alert("Data berhasil dihapus");
	</script>
	<?php
		
			echo '<script>window.history.back()</script>';
		}else{
			echo '<div class="alert alert-danger" role="alert"><strong>Oh!</strong>Gagal Menghapus Data.</div>';	
		}
	}
}
?>
</div>