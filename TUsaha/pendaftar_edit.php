
<div id="main"> <a name="TemplateInfo"></a>
<html>
	<head>
	
		<link rel="stylesheet" href="datepicker/themes/base/jquery.ui.all.css">
	<script src="datepicker/js/jquery-1.7.2.js"></script>
	<script src="datepicker/ui/jquery.ui.core.js"></script>

	
	<script src="datepicker/ui/jquery.ui.widget.js"></script>
	<script src="datepicker/ui/jquery.ui.datepicker.js"></script>
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({
		dateFormat:"yy/mm/dd",
			changeMonth: true,
			changeYear: true
		});
	});
	</script>
	
	</head>
	<?php	

if(isset($_POST['btnSimpan'])){
	

$id 	= isset($_GET['id']) ?  $_GET['id'] : $_POST['id']; 

	$nama				=$_POST['nama'];

	$jenis_kel			=$_POST['jenis_kel'];
	$tempat_lahir		=$_POST['tempat_lahir'];
	$tgl_lahir			=$_POST['tgl_lahir'];
	$agama				=($_POST['agama']);
	
	$telepon			=$_POST['telepon'];
	
	$ayah				=$_POST['ayah'];
	$kerja_ayah			=$_POST['kerja_ayah'];
	$ibu				=$_POST['ibu'];

	$alamat				=$_POST['alamat'];
 



  error_reporting(0);
	# Validasi form, jika kosong sampaikan pesan error
	$pesanError = array();
	if(trim($nama)=="") {
		$pesanError[] = "Data <b>Nama</b> tidak boleh kosong, harus diisi !";		
	}


	if(trim($tempat_lahir)=="") {
		$pesanError[] = "Data <b>tempat lahir</b> tidak boleh kosong, harus diisi !";		
	}
	if(trim($tgl_lahir)=="") {
		$pesanError[] = "Data <b>tgl_lahir</b> tidak boleh kosong, harus diisi !";		
	}

	
	# JIKA ADA PESAN ERROR DARI VALIDASI
	if (count($pesanError)>=1 ){
		echo "<div class='mssgBox'>";
		echo "<hr>";
			$noPesan=0;
			foreach ($pesanError as $indeks=>$pesan_tampil) { 
			$noPesan++;
				echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
			} 
		echo "</div> <br>"; 
	}
	else {
		# SIMPAN DATA KE DATABASE. Jika tidak menemukan pesan error, simpan data ke database	

		
				# SKRIP UNTUK MENYIMPAN FOTO/GAMBAR
		if (! empty($_FILES['namaFile']['tmp_name'])) {
			// Membaca nama file foto/gambar
			$file_foto = $_FILES['namaFile']['name'];
			$file_foto = stripslashes($file_foto);
			$file_foto = str_replace("'","",$file_foto);
			
			// Simpan gambar
			//$file_foto = $kodeBaru.".".$file_foto;
			copy($_FILES['namaFile']['tmp_name'],"photo/".$file_foto);
		}
		else {
			// Jika tidak ada foto/gambar
			$file_foto = "";
		}
		
		

		

		
	// SQL Simpan data ke tabel database

				$mySql	= mysql_query("UPDATE biodata SET
									nama='$nama',jenis_kel='$jenis_kel', tgl_lahir='$tgl_lahir', alamat = '$alamat', tempat_lahir='$tempat_lahir', agama='$agama', photo='$file_foto', telepon='$telepon', ayah='$ayah',kerja_ayah='$kerja_ayah',ibu='$ibu'
							WHERE id_utama='$id'"); 
						
		if($mySql){
			?>
<script type="text/javascript">
		alert("Data berhasil diubah");
	</script>
	<?php
	echo "<meta http-equiv='refresh' content='0; url=?page=daftar.siswa2'>";
?>
			
			<?php
		}
		exit;
	}	
	}
 // Penutup POST
	
	
	
	
	

if(isset($_GET['id'])){
$id = $_GET['id'];
	$cek = mysql_query("SELECT id_utama FROM biodata WHERE id_utama='$id'") or die(mysql_error());
# TAMPILKAN DATA LOGIN UNTUK DIEDIT
$mySql 	= "SELECT * FROM biodata WHERE id_utama='$id'";



$myQry 	= mysql_query($mySql)  or die (mysql_error());
$myData = mysql_fetch_array($myQry); 




	$nama			= isset($_POST['nama']) ? $_POST['nama'] : $myData['nama'];
	$jenis_kel			= isset($_POST['jenis_kel']) ? $_POST['jenis_kel'] : $myData['jenis_kel'];
	$agama			= isset($_POST['agama']) ? $_POST['agama'] : $myData['agama'];
	$tempat_lahir			= isset($_POST['tempat_lahir']) ? $_POST['tempat_lahir'] : $myData['tempat_lahir'];
	$tgl_lahir			= isset($_POST['tgl_lahir']) ? $_POST['tgl_lahir'] : $myData['tgl_lahir'];
	$alamat			= isset($_POST['alamat']) ? $_POST['alamat'] : $myData['alamat'];
	
	
	$photo			= isset($_POST['photo']) ? $_POST['photo'] : $myData['photo'];
	$telepon			= isset($_POST['telepon']) ? $_POST['telepon'] : $myData['telepon'];
	$ayah			= isset($_POST['ayah']) ? $_POST['ayah'] : $myData['ayah'];
	$kerja_ayah			= isset($_POST['kerja_ayah']) ? $_POST['kerja_ayah'] : $myData['kerja_ayah'];
	$ibu			= isset($_POST['ibu']) ? $_POST['ibu'] : $myData['ibu'];


	}
	
	
	?>
	<body>
		<ul class="breadcrumb">
            <h4>Edit Pendaftar</h4>
    </ul>
		<form method="post" name="postform" enctype="multipart/form-data" target="_self">
			<table class="table-list" width="100%">
<tr>
					
				<tr>
					<td>Nama</td>
					<td><input type="text" name="nama"  class = "form-control" value="<?php echo $nama; ?>" size="50"/></td>
				</tr>

    <tr>
      <td>Jenis Kelamin</td>
      <td><select name="jenis_kel" class = "form-control">
        <option value="<?php echo $jenis_kel; ?>"><?php echo $jenis_kel; ?>
        <option value="Laki-Laki" <?php if($jenis_kel=='Laki-Laki'){ echo "selected='selected'";} ?>>Laki-Laki
        <option value="Perempuan" <?php if($jenis_kel=='Perempuan'){ echo "selected='selected'";} ?>>Perempuan
      </select>
      </td>
    </tr>
			<tr>
					<td>Tempat Lahir</td>
					<td><input type="text" name="tempat_lahir"  class = "form-control" value="<?php echo $tempat_lahir; ?>" size="50"/></td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td><input type="text" name="tgl_lahir" class = "form-control"  size="19" value="<?php echo $tgl_lahir; ?>" id="datepicker"/>

					</td>
				</tr>
				<tr>
				<td>Agama</td>
				<td><select name="agama" class = "form-control">
						<option value="<?php echo $agama; ?>"><?php echo $agama; ?>
						<option value="Islam" <?php if($agama=='Islam'){ echo "selected='selected'";} ?>> Islam
						<option value="Kristen" <?php if($agama=='Kristen'){ echo "selected='selected'";} ?>> Kristen
						<option value="Katholik" <?php if($agama=='Katholik'){ echo "selected='selected'";} ?>> Katholik
						<option value="Hindu" <?php if($agama=='Hindu'){ echo "selected='selected'";} ?>> Hindu
						<option value="Budha" <?php if($agama=='Budha'){ echo "selected='selected'";} ?>> Budha
					</select>      
				</td>
			</tr>
			<tr>
					<td>Alamat</td>
					<td><textarea name="alamat" class = "form-control"  value=""><?php echo $alamat; ?></textarea>
					
				</tr>
				<tr>
					<td>Photo</td>
					<td><input type="file" name="namaFile" class = "form-control" value="<?php echo $photo; ?>"size="50"/></td>
				</tr>
				<tr>
					<td>No. Telp</td>
					<td><input type="text" name="telepon"  class = "form-control" value="<?php echo $telepon; ?>"size="50"/></td>
				</tr>
				
				<tr>
					<td>Nama Ayah</td>
					<td><input type="text" name="ayah" class = "form-control" value="<?php echo $ayah; ?>"size="50"/></td>
				</tr>
				<tr>
				<td>Pekerjaan Ayah</td>
				<td><select name="kerja_ayah" class = "form-control" >
						<option value="<?php echo $kerja_ayah;?>"><?php echo $kerja_ayah;?>
						<option value="PNS" <?php if($kerja_ayah=='PNS'){ echo "selected='selected'";} ?>>PNS
						<option value="Wiraswasta" <?php if($kerja_ayah=='Wiraswata'){ echo "selected='selected'";} ?>>Wiraswasta
						<option value="Pegawai Swasta" <?php if($kerja_ayah=='Pegawai Swasta'){ echo "selected='selected'";} ?>>Pegawai Swasta 
						<option value="Buruh" <?php if($kerja_ayah=='Buruh'){ echo "selected='selected'";} ?>>Buruh
						<option value="Pedagang" <?php if($kerja_ayah=='Pedagang'){ echo "selected='selected'";} ?>>Pedagang
						<option value="Lain-lain" <?php if($kerja_ayah=='Lain-lain'){ echo "selected='selected'";} ?>>Lain-lain
					</select>      
				</td>
			</tr>
			
				<tr>
					<td>Nama Ibu</td>
					<td><input type="text" name="ibu" class = "form-control"value="<?php echo $ibu; ?>" size="50"/></td>
				</tr>
				<tr>
                
				<tr>
					<td>&nbsp;</td>
					<td><input name="btnSimpan"  type="submit" value="Simpan" class="btn btn-info btn-primary"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>
</div>
