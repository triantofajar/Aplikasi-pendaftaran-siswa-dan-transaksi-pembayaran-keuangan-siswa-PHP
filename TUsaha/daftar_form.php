
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
	

	<?php
include "../config/koneksi.php";
include "../config/library.php";



include "../config/function_acak.php";



// Fungsi untuk Merubah susunan format tanggal
    function formatTgl($tanggal) {
        $pisah = explode('/',$tanggal);
        $urutan = array($pisah[2],$pisah[1],$pisah[0]);
        $satukan = implode('-',$urutan);
        return $satukan;
    }


error_reporting(0);
$passacak = acak(6); 
# TOMBOL SIMPAN DIKLIK
if(isset($_POST['Simpan'])){
	# Baca Variabel Form

	$nama				=$_POST['nama'];

	$jenis_kel			=$_POST['jenis_kel'];
	$tempat_lahir		=$_POST['tempat_lahir'];
	$tgl_lahir			=$_POST['tgl_lahir'];
	$agama				=($_POST['agama']);
	
	$telepon			=$_POST['telepon'];
	
	$ayah				=$_POST['ayah'];
	$kerja_ayah			=$_POST['kerja_ayah'];
	$ibu				=$_POST['ibu'];
	
	$tgl_daftar			=date("Y-m-d");
	$alamat				=$_POST['alamat'];
	
	# Validasi form, jika kosong sampaikan pesan error


	# VALIDASI Email DI DATABASE, jika sudah ada akan ditolak
	$sqlCek="SELECT * FROM biodata WHERE nama='$nama'";
	$qryCek=mysql_query($sqlCek) or die ("Eror Query".mysql_error()); 
	if(mysql_num_rows($qryCek)>=1){
		$pesanError[] = "Maaf, Nama : <b> $nama </b> sudah ada";
	}
	if(trim($nama)=="") {
		$pesanError[] = "<b>Nama</b> tidak boleh kosong, harus diisi !";		
	}
	if(trim($tempat_lahir)=="") {
		$pesanError[] = "<b>Tempat Lahir</b> tidak boleh kosong, Silahkan diisi !";		
	}
	if(trim($tgl_lahir)=="") {
		$pesanError[] = "<b>Tanggal Lahir</b> tidak boleh kosong, Silahkan diisi !";		
	}
	if(trim($agama)=="") {
		$pesanError[] = "<b>Agama</b> tidak boleh kosong, Silahkan diisi !";		
	}
		if(trim($ayah)=="") {
		$pesanError[] = "<b>Nama Ayah</b> tidak boleh kosong, Silahkan diisi !";		
	}
		if(trim($ibu)=="") {
		$pesanError[] = "<b>Nama Ibu</b> tidak boleh kosong, Silahkan diisi !";		
	}
		if(trim($telepon)=="") {
		$pesanError[] = "<b>Telpon</b> tidak boleh kosong, Silahkan diisi !";		
	}
		if(trim($alamat)=="") {
		$pesanError[] = "<b>Alamat</b> tidak boleh kosong, Silahkan diisi !";		
	}
	
	


	# JIKA ADA PESAN ERROR DARI VALIDASI
	if (count($pesanError)>=1 ){
		echo "<div class='mssgBox'>";
		echo "<img src='../images/belum.png' width='36px'> Maaf, Anda Belum Mengisi / Melengkapi Formulir<br><hr>";
			$noPesan=0;
			foreach ($pesanError as $indeks=>$pesan_tampil) { 
			$noPesan++;
				echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
			} 
		echo "</div> <br>"; 
	}
	else {
		# SIMPAN DATA KE DATABASE. Jika tidak menemukan pesan error, simpan data ke database
		// Membuat Kode Siswa
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

		// fungsi menampilkan tgl
		//$frmt_tgl = formatTgl ($tgl_lahir);
		


		// Simpan data dari form ke Database
		$mySql	= "INSERT INTO biodata ( 
									id_utama, nama ,jenis_kel, tgl_lahir, tempat_lahir, agama, tgl_daftar, photo, telepon, ayah,kerja_ayah,ibu, alamat )
							VALUES ( 
									'$id_utama','$nama','$jenis_kel','$tgl_lahir','$tempat_lahir','$agama','$tgl_daftar','$file_foto','$telepon','$ayah','$kerja_ayah','$ibu','$alamat'
									)";		

		$myQry	= mysql_query($mySql) or die (mysql_error());

		if($myQry) 
		
		
		{
			?>
		<script type="text/javascript">
			alert("Data berhasil ditambahkan");
		</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=?page=daftar.siswa2'>";
					
					
				?>	
					

					
					
				
			<?php
		}
		exit;
	}	
} // Penutup POST

# MEMBUAT NILAI DATA PADA FORM

$nama		= isset($_POST['nama']) ? $_POST['nama'] : '';

$jenis_kel	= isset($_POST['jenis_kel']) ? $_POST['jenis_kel'] : '';
$tempat_lahir	= isset($_POST['tempat_lahir']) ? $_POST['tempat_lahir'] : '';
$tgl_lahir	= isset($_POST['tgl_lahir']) ? $_POST['tgl_lahir'] : '';
$agama	= isset($_POST['agama']) ? $_POST['agama'] : '';


$photo	= isset($_POST['photo']) ? $_POST['photo'] : '';
$telepon	= isset($_POST['telepon']) ? $_POST['telepon'] : '';

$ibu	= isset($_POST['ibu']) ? $_POST['ibu'] : '';
$ayah	= isset($_POST['ayah']) ? $_POST['ayah'] : '';
$kerja_ayah	= isset($_POST['kerja_ayah']) ? $_POST['kerja_ayah'] : '';
$alamat	= isset($_POST['alamat']) ? $_POST['alamat'] : '';




?>
<h2>Formulir Pendaftaran</h2>
<p>Isilah Formulir ini dengan lengkap dan benar! (menggunakan huruf kapital)</p>
 <form id="newsletter" enctype="multipart/form-data"  method="post" name="postform">
   <table width="105%">

				
				<tr>
					<td width="140">Nama</td>
					<td><input  class="form-control" type="text" name="nama"   value="<?php echo $nisn; ?>"/></td>
				</tr>
					<input hidden type="text" name="password"  value="<?php   echo $passacak; ?>" size="50"/>
                <tr>
				<td>Jenis Kelamin</td>
				<td><select class="form-control" name="jenis_kel" >
						<option value="0">--Pilih Jenis Kelamin--
						<option value="Laki-Laki" <?php if($jenis_kel=='Laki-Laki'){ echo "selected='selected'";} ?>>Laki-laki
						<option value="Perempuan" <?php if($jenis_kel=='Perempuan'){ echo "selected='selected'";} ?>>Perempuan
					</select>      
				</td>
			</tr>
				<tr>
					<td>Tempat Lahir</td>
					<td><input type="text" class="form-control" name="tempat_lahir" value="<?php   echo $tempat_lahir; ?>" /></td>
				</tr>
							<tr>
					<td>Tanggal Lahir</td>
					<td><div class='input-group date'>
						  <input type="text" name="tgl_lahir"  class="form-control" value="<?php echo $tgl_lahir; ?> "  id="datepicker"/>
					
						  <span class="input-group-addon">
						   <span class="glyphicon glyphicon-calendar"></span>
						  </span>
						 </div>
					</td>
				</tr>
				<tr>
				<td>Agama</td>
				<td><select class="form-control" name="agama" >
						<option value="0">--Pilih Agama--
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
					<td><textarea class="form-control" name="alamat" ></textarea>
					</td>
				</tr>
				<tr>
					<td>Photo</td>
					<td><input type="file" class="form-control" name="namaFile"   size="50" /></td>
				</tr>
					<tr>
					<td>No. Telp</td>
					<td><input type="text" class="form-control" name="telepon" type="numeric" size="50" value="<?php   echo $telepon; ?>" /></td>
				</tr>
				
				<tr>
					<td>Nama Ayah</td>
					<td><input type="text" class="form-control"  name="ayah"  size="50" value="<?php   echo $ayah; ?>" /></td>
				</tr>
				<tr>
				<td>Pekerjaan Ayah</td>
				<td><select  class="form-control"  name="kerja_ayah"  value="<?php   echo $kerja_ayah; ?>" >
						<option value="0">--Pilih Pekerjaan--
						<option value="PNS" <?php if($kerja_ayah=='PNS'){ echo "selected='selected'";} ?>>PNS
						<option value="Wiraswasta" <?php if($kerja_ayah=='Wiraswasta'){ echo "selected='selected'";} ?>>Wiraswasta
						<option value="Pegawai Swasta" <?php if($kerja_ayah=='Pegawai Swasta'){ echo "selected='selected'";} ?>>Pegawai Swasta 
						<option value="Buruh" <?php if($kerja_ayah=='Buruh'){ echo "selected='selected'";} ?>>Buruh
						<option value="Pedagang" <?php if($kerja_ayah=='Pedagang'){ echo "selected='selected'";} ?>>Pedagang
						<option value="Lain-lain" <?php if($kerja_ayah=='Lain-lain'){ echo "selected='selected'";} ?>>Lain-lain
					</select>      
				</td>
			</tr>
				<tr>
					<td>Nama Ibu</td>
					<td><input  class="form-control" type="text" name="ibu"  size="50" value="<?php   echo $ibu; ?>" /></td>
				</tr>
				<td>&nbsp;</td>
				
				<td><button type="submit" value="Simpan" name="Simpan" class="btn btn-info btn-primary">Simpan</button></td>
				<td></td>

			</tr>
			</tr>
			
                </form>
				</table>
				
				
	


    <!--/span-->

</body>
</html>

<!--  untuk membatu menampilkan tanggal -->
	<iframe width=174 height=189 name="gToday:normal:./calender/agenda.js" id="gToday:normal:./calender/agenda.js" src="./calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe>