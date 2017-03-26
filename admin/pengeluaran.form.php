<?php

include "../config/koneksi.php";
include "config/fungsi_rupiah.php";
include "fungsi_indotgl.php";



if(isset($_POST['Simpan'])){

error_reporting(0);

 	$id_keluar    = $_POST['id_keluar'];
	$jenis = $_POST['jenisKeluar'];
	$qty   = $_POST['qty'];
	$tgl_keluar   = date("Y-m-d");
	$harga = $_POST['harga'];
	$jumlah = $_POST['jumlah'];
	$bendahara = $_POST['bendahara'];



	$query = "INSERT INTO tbl_pengeluaran(id_keluar, jenisKeluar, qty, tgl_keluar, 
										  harga, jumlah, bendahara)
			  VALUES('$id_keluar', '$jenis', '$qty', '$tgl_keluar', '$harga', '$jumlah', '$bendahara')";
	$insert = mysql_query($query) or die(mysql_error());

	if($insert) {
			?>
		<script type="text/javascript">
			alert("Data berhasil ditambahkan");
		</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=admin.php?page=pengeluaran.form&&id'>";
					
									

  } 
}

?>


<ul class="breadcrumb">
            <h4>Form Pengeluaran</h4>
    </ul>
<form id="newsletter" enctype="multipart/form-data"  method="post" name="postform" onsubmit="_validasi();">
   <table width="100%">

   	<input type="hidden" name="bendahara" value="<?php echo $_SESSION['nama']; ?>">
  


				<tr>
					<td width="140">Jenis Pengeluaran</td>
					<td><input  class="form-control" type="text" name="jenisKeluar" />
					    
					</tr>

				<tr>
					<td>Qty</td>
					<td>
						<select name="qty" class="form-control" id="qty">
						<option>--Qty--</option>
						<?php
						for($n=1; $n <= 10; $n++){	
							echo "<option>$n</option>" ;
						}
						?>
						</select>

					</td>
				</tr>						
				<tr>
					<td>Harga Satuaan (Rp.)</td>
					<td><input type="text" class="form-control reset"  name="harga" id="harga" />
					</td>
					
				</tr>
				<tr>
					<td>Jumlah Bayar (Rp.)</td>
					<td><input type="text" class="form-control reset"  name="jumlah" id="jumlah" placeholder="0" readonly="readonly" />
					</td>
					
				</tr>
				

				<tr>
				<td>&nbsp;</td>
				<td><button type="submit" value="Simpan" name="Simpan" class="btn btn-info btn-danger"><i class="glyphicon glyphicon-save"></i> Simpan</button></td>
				

			</tr>
			</tr>
				</table>
				</form>

	  <script type="text/javascript">
	 
	        var qty_form = document.getElementById('qty');
	        var qty = parseInt(qty_form.value);
	        

	        var harga_form = document.getElementById('harga');
	        var harga = parseInt(harga_form.value);

	        var jumlah_form = document.getElementById('jumlah');
	        var jumlah = parseInt(jumlah_form.value);

	        
	       harga_form.onkeyup = function(){

	        var qty_form = document.getElementById('qty');
	        var qty = parseInt(qty_form.value);
	        

	        var harga_form = document.getElementById('harga');
	        var harga = parseInt(harga_form.value);

	        var jumlah_form = document.getElementById('jumlah');
	        var jumlah = parseInt(jumlah_form.value);

	          jumlah_bayar = qty * harga;

	          jumlah_form.value = jumlah_bayar;
	          }

	</script> 

<?php
if(isset($_GET['id']))
{

?>

<br>
<h4><center>Daftar Pengeluaran Paud Rosella </center></h4>
         <style type="text/css">
            hr.style2 {
            border-top: 3px double #8c8b8b;
            }
          </style>
  
  <hr class="style2">

      <br>
      <?php
      $sql = "SELECT * FROM tbl_pengeluaran WHERE tgl_keluar AND konfirmasi = '0' ";
      $query = mysql_query($sql);
      $view = mysql_fetch_array($query);

      ?>

      <table>
      	<tr><td>Tanggal Pengeluaran</td><td>:</td><td><?php echo tgl_indo($view['tgl_keluar']); ?></td></tr>

      </table>

      <?php
      if(isset($_POST['Kirim'])){

      	$total = $_POST['total'];


      	$sqlGet = mysql_query("SELECT * FROM tbl_pengeluaran 
      	              WHERE tgl_keluar = '" . $view['tgl_keluar'] . "' 
      	              AND konfirmasi = '0' ");

      	//generate invoice
      	$invoice = mt_rand(1,1000);
      	
      	while ($tmp = mysql_fetch_array($sqlGet)) {
      	
      	//update set invoice
      	 $updateInvoice = mysql_query(" UPDATE tbl_pengeluaran SET invoice = '$invoice' WHERE id_keluar = '" . $tmp['id_keluar'] . "' ");


      	}


      	$updateKeluar = "UPDATE tbl_pengeluaran SET total = '$total', konfirmasi = '1' WHERE tgl_keluar = '".$view['tgl_keluar']."' ";

      	$update = mysql_query($updateKeluar) or die (mysql_error());

      	?>
      		<script type="text/javascript">
      			alert("Data berhasil ditambahkan");
      		</script>
      	
      	<?php
      	echo "<meta http-equiv='refresh' content='0; url=admin.php?page=printKeluar.view&&invoice=$invoice'>";
      		


      }


      ?>
      	
      	<form enctype="multipart/form-data"  method="post" name="postform" >
		<div class="box-content">
	    <table class="table table-striped table-bordered responsive">
	    <thead>
			<tr>
				<th>No.</th>
				<th>Jenis Pengeluaran</th>
				<th>Qty</th>
				
				<th>Harga Satuan</th>
				<th>Jumlah Bayar</th>
				<th>Hapus Item</th>


				
				
			</tr>
			</thead>
			
			<tbody>
			<?php


			  $sql = mysql_query("SELECT * FROM tbl_pengeluaran WHERE konfirmasi = '0' ");
			  
			  $no=0;
			  while ($data = mysql_fetch_array($sql)){
			    $no++;
			    // gradasi warna
			    
			    echo '<tr>';
			      echo '<td>'.$no.'</td>';  //menampilkan nomor urut
			      echo '<td>'.$data['jenisKeluar'].'</td>';
			      echo '<td>'.$data['qty'].'</td>';
				  echo '<td> Rp. '.format_rupiah($data['harga']).'</td>';
				  echo '<td> Rp. '.format_rupiah($data['jumlah']).'</td>';
				  echo '<td> <a href="?page=pengeluaran.hapus&amp;id='.$data['id_keluar'].'" onclick="return confirm(\'Yakin ingin menghapus ?\')" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-trash"></i></a></td>';
			          //menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
			    echo '</tr>';
			      
			  }
			
			?>
			<?php
								$sum = mysql_query("SELECT SUM(jumlah) as total FROM tbl_pengeluaran
			                              WHERE tgl_keluar = '".$view['tgl_keluar']."' AND konfirmasi = '0' ");
								$data = mysql_fetch_array($sum);
			?>
			<tr>
			<td colspan="3"><b><center>Total Pengeluaran ( Rp. )</center></b></td>
			<td colspan="3"><b><input type="text"  class="form-control"  name="total" value="<?php echo $data['total']; ?>"  readonly="readonly" /></b></td>
			</tr>

			  </tbody>
			</table>
			

			<div class="btn-group pull-right">
			<button type="submit" value="Kirim" name="Kirim" class="btn btn-info btn-danger"><i class="glyphicon glyphicon-upload"></i> Kirim</button>
			</div>
  <?php
	}
	?>