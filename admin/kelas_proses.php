<div id="main"> <a name="TemplateInfo"></a>
<?php

error_reporting(0);
if(isset($_POST['Kirim'])){
	$id_kelas=$_POST['id_kelas'];
	$nama_kelas=$_POST['nama_kelas'];
	$daya_tampung=$_POST['daya_tampung'];

	 //VALIDASI Email DI DATABASE, jika sudah ada akan ditolak
	$sqlCek="SELECT * FROM kelas WHERE id_kelas='$id_kelas'";
	$qryCek=mysql_query($sqlCek) or die (mysql_error()); 
	if(mysql_num_rows($qryCek)>=1){
		$pesanError[] = "Maaf, ID Kelas : <b> $id_kelas </b> sudah ada";
	}
	# JIKA ADA PESAN ERROR DARI VALIDASI
	if (count($pesanError)>=1 ){
		echo "<div class='mssgBox'>";
		
			$noPesan=0;
			foreach ($pesanError as $indeks=>$pesan_tampil) { 
			echo "<img src='../images/belum.png' width='36px'>  $pesan_tampil<br><hr>";
			echo "<a href = ?page=kelas_add>Kembali </a>";
			} 
		echo "</div> <br>"; 
	}
	
	$query=mysql_query("INSERT INTO kelas(id_kelas, nama_kelas, daya_tampung) 
						values('$id_kelas', '$nama_kelas', '$daya_tampung')");
						
				if($query){
				
					
			echo "<meta http-equiv='refresh' content='0; url=admin.php?page=kelas_view'>"; 
					
				}
		
}else{
	unset($_POST['Kirim']);
}
?>
</div>