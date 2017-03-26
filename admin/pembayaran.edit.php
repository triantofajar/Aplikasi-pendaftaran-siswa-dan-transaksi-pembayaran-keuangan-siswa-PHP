<div id="main"> <a name="TemplateInfo"></a>
<!DOCTYPE html>
<html>
	<head>
	<title>Edit Pembayaran</title>
	</head>

	<body>
	<?php
	include "../config/koneksi.php";

	//cek dahulu, jika tombol simpan di klik
	if(isset($_POST['btnSimpan'])){
		
		$kode_bayar		=	$_POST['kode_bayar'];
		$jenis			= $_POST['jenis'];
		$harga			=	$_POST['harga'];
		
			# SIMPAN DATA KE DATABASE. Jika tidak menemukan pesan error, simpan data ke database	
					
			// Membaca Kode dari form hidden
			$kode_bayar	= $_POST['kode_bayar'];
			
		// SQL Simpan data ke tabel database
			$mySql	= mysql_query("UPDATE tbl_pembayaran SET 
							kode_bayar='$kode_bayar', jenis='$jenis' , harga='$harga' WHERE kode_bayar='$kode_bayar'");
			if($mySql){
				
				
						echo "<meta http-equiv='refresh' content='0; url=admin.php?page=pembayaran.view'>";
				
			}
			exit;
		}	
	 // Penutup POST
			
	// Skrip membaca variable dari URL (Kode dikirim dari menu Edit)
	$id	= isset($_GET['id']) ?  $_GET['id'] : $_POST['id']; 

	# TAMPILKAN DATA LOGIN UNTUK DIEDIT
	$mySql 	= "SELECT * FROM tbl_pembayaran WHERE kode_bayar='$id'";
	$myQry 	= mysql_query($mySql)  or die (mysql_error());
	$myData = mysql_fetch_array($myQry); 

	# MEMBUAT NILAI DATA PADA FORM
		// Masukkan data ke dalam variabel, supaya bisa dipanggil di Form
		$kode_bayar	= $myData['kode_bayar'];
		$jenis	= isset($_POST['jenis']) ? $_POST['jenis'] : $myData['jenis'];
		$harga = isset($_POST['harga']) ? $_POST['harga'] : $myData['harga'];
		
	?>
<div id="content" class="col-lg-12 col-sm-12">
<ul class="breadcrumb">
        <li>
           <h4>Edit Pembayaran</h4>
        </li>
    </ul>
		<form action="" method="post" name="post" enctype="multipart/form-data" target="_self">

			<table class="table-list" width="70%" border="0" cellpadding="3" cellspacing="1">


				<tr>
					<td>Kode Bayar</td>
					<td><input type="text" name="kode_bayar"  class="form-control" id="inputSuccess1" size="20" value="<?php echo $kode_bayar; ?>" readonly="readonly"/></td>
				</tr>
				<tr>
					<td>Jenis Pembayaran</td>
					<td><input type="text" name="jenis"  class="form-control" id="inputSuccess1" size="50" value="<?php echo $jenis; ?>" /></td>
				</tr>
				<tr>
					<td>Jumlah Harga</td>
					<td><input type="text" name="harga"  class="form-control" id="inputSuccess1" size="50" value="<?php echo $harga; ?>" /></td>
				</tr>
			<tr>
				
					<td>&nbsp;</td>
					<td><input name="btnSimpan" type="submit" class="btn btn-info btn-primary" value=" Simpan "></td>
				</tr>	
			</table>
		</form>
	</body>
</html>
</div>