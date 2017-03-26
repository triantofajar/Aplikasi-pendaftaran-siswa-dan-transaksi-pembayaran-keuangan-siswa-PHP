<div id="main"> <a name="TemplateInfo"></a>
	<?php
        if (isset($_POST['kirim']))
		{
               	
                $id_biodata = $_POST['id_biodata'];
                $kelas = $_POST['kelas'];
				
		
				$query = "INSERT INTO kelas_siswa (id_biodata, kelas) VALUES ('$id_biodata','$kelas') ";
				$hasil = mysql_query($query) or die(mysql_error());

				$queryUpdate = "UPDATE biodata set status = 'aktif' WHERE id_utama = '$id_biodata' ";
				
				$update = mysql_query($queryUpdate) or die(mysql_error());				
        }		
   	?>
	<script>
		window.location='admin.php?page=daftar.kelas';
	</script>
</div>