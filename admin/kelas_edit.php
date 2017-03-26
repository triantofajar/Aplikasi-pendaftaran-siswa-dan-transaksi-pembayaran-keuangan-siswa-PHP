<div id="main"> <a name="TemplateInfo"></a>
<!DOCTYPE html>
<html>
	<head>
	<title>Edit Kelas Siswa</title>
	</head>

	<body>
	<?php
	include "../config/koneksi.php";

	//cek dahulu, jika tombol simpan di klik
	if(isset($_POST['btnSimpan'])){
		
		$id_kelas		=	$_POST['id_kelas'];
		$nama_kelas			= $_POST['nama_kelas'];
		$daya_tampung			=	$_POST['daya_tampung'];
		
			# SIMPAN DATA KE DATABASE. Jika tidak menemukan pesan error, simpan data ke database	
					
			// Membaca Kode dari form hidden
			$id_kelas	= $_POST['id_kelas'];
			
		// SQL Simpan data ke tabel database
			$mySql	= mysql_query("UPDATE kelas SET 
							id_kelas='$id_kelas', nama_kelas='$nama_kelas' , daya_tampung='$daya_tampung' WHERE id_kelas='$id_kelas'");
			if($mySql){
				
				
						echo "<meta http-equiv='refresh' content='0; url=admin.php?page=kelas_view'>";
				
			}
			exit;
		}	
	 // Penutup POST
			
	// Skrip membaca variable dari URL (Kode dikirim dari menu Edit)
	$id	= isset($_GET['id']) ?  $_GET['id'] : $_POST['id']; 

	# TAMPILKAN DATA LOGIN UNTUK DIEDIT
	$mySql 	= "SELECT * FROM kelas WHERE id_kelas='$id'";
	$myQry 	= mysql_query($mySql)  or die (mysql_error());
	$myData = mysql_fetch_array($myQry); 

		# MEMBUAT NILAI DATA PADA FORM
		// Masukkan data ke dalam variabel, supaya bisa dipanggil di Form
		$id_kelas	= $myData['id_kelas'];
		$nama_kelas	= isset($_POST['nama_kelas']) ? $_POST['nama_kelas'] : $myData['nama_kelas'];
		$daya_tampung = isset($_POST['daya_tampung']) ? $_POST['daya_tampung'] : $myData['daya_tampung'];
		
	?>
<div id="content" class="col-lg-12 col-sm-12">
<ul class="breadcrumb">
        <li>
           <h4>Edit Kelas</h4>
        </li>
    </ul>
		<form action="" method="post" name="post" enctype="multipart/form-data" target="_self">

			<table class="table-list" width="30%" border="0" cellpadding="3" cellspacing="1">


	

				<tr>
					<td>Kode Kelas</td>
					<td>&nbsp;</td>
					<td><input type="text" name="id_kelas" class="form-control" id="inputSuccess1" value="<?php echo $id_kelas; ?>"  maxlength="100" readonly="readonly"/></td>
				</tr>
				<tr>
					<td>Nama Kelas</td>
					<td></td>
					<td><input type="text" name="nama_kelas" class="form-control" id="inputSuccess1" value="<?php echo $nama_kelas; ?>"  maxlength="100"></td>
				</tr>
				<tr>
					<td>Daya Tampung</td>
					<td></td>
					<td><input type="text"  name="daya_tampung" class="form-control" id="inputSuccess1" value="<?php echo $daya_tampung; ?>"  maxlength="100"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><input name="btnSimpan" type="submit" class="btn btn-info btn-primary" value=" Simpan "></td>
				</tr>	
			</table>
		</form>
	</body>
</html>
</div>