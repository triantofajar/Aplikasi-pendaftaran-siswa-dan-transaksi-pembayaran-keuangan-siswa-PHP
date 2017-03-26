<div class="btn-group pull-right">	
	 <a class="btn btn-sm btn-danger" href="pdf/cetak.pengeluaran.php?invoice= <?php echo $_GET['invoice'];?>" target="_blank"><span class="fa fa-print"></span><i class="glyphicon glyphicon-print"></i> Cetak Pengeluaran </a>  
</div>
<br><br>

<div class="panel panel-default">
	<div class="panel-body">
		<div class="row">
						
					
							
							<div class="col-md-2">
							<img src="../media/images/logo paud.png" class="img-responsive pull-left" style="max-height:120px;display:inline">

							</div>
					
					
								&nbsp;&nbsp;&nbsp;&nbsp;
								<font size="6"><b>BKB PAUD ROSELLA  <br> &nbsp;&nbsp;RW.02 KEL.DUREN TIGA</font>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JL. DUREN TIGA BARAT VI RT 006 / 02 KELURAHAN DUREN TIGA
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telp. : (021) 794 12 761</b> 

	<style type="text/css">
			hr.style2 {
			border-top: 3px double #8c8b8b;
			}
		</style>
	
	<hr class="style2">
    
	<h3><center><b>Daftar Pengeluaran Paud Rosella</b></center></h3>

      <br>

      <table>
          <?php
          	include "../config/koneksi.php";
			include "config/fungsi_rupiah.php";
			include "fungsi_indotgl.php";


					   
					    $invoice = $_GET['invoice'];

					    $query = "SELECT * FROM tbl_pengeluaran 
					              WHERE konfirmasi = '1' AND invoice = '$invoice' ";
					    $myQry = mysql_query($query);
					    $str  = mysql_fetch_array($myQry);

		error_reporting(0);

             	$sql1 = mysql_query("SELECT * FROM tbl_pengeluaran
             	              		WHERE  invoice = '$invoice' ");
             	$tgl = mysql_fetch_array($sql1);
             
         
         ?>
        <table>

        <tr>
        <td>Tanggal Pengeluaran</td><td>:</td><td><?php echo tgl_indo($tgl['tgl_keluar']); ?></td></tr>

        
        
      </table>

			<div class="box-content">
	    <table width="97%" class="table-bordered">
	      <thead>
			<tr>
				<th>No.</th>
				<th>Jenis Pengeluaran</th>
				<th>Qty</th>
				<th>Harga Satuan</th>
				<th>Jumlah Bayar</th>
				
				
				
			</tr>
			</thead>    
			
			<tbody>


		<?php
		
		//jenis pengeluaran

		$invoice = $_GET['invoice'];

			$sql = mysql_query("SELECT * FROM tbl_pengeluaran 
                          		WHERE invoice = '$invoice' AND konfirmasi = '1'
                          		");
			$no=0;
			while ($tampil = mysql_fetch_array($sql)) {
				$no++;
				// gradasi warna
				
				echo '<tr>';
					echo '<td>'.$no.'</td>';	//menampilkan nomor urut
					echo '<td>'.$tampil['jenisKeluar'].'</td>';
					echo '<td>'.$tampil['qty'].'</td>';
					echo '<td> Rp. '.format_rupiah($tampil['harga']).'</td>';
					echo '<td> Rp. '.format_rupiah($tampil['jumlah']).'</td>';
					
				echo '</tr>';
					
			}

		?>
			<?php

	 		//total,bayar,kembali

	 		$id = $_GET['id'];
	 		$queryBayar = "SELECT *	FROM tbl_pengeluaran 
						   WHERE invoice = '$invoice' 
						    ";
			$hasil		= mysql_query($queryBayar) or die (mysql_error());
			$row		= mysql_fetch_array($hasil);

			?>

		
			<tr>
				<td colspan="3" pan="3" align="center"><b>Total Pengeluaran</b></td>
				<td colspan="2"><b><?php echo 'Rp. '.format_rupiah($row['total']); ?></b></td>
			</tr>
		
			
				
		</tbody>
	</table>
	</div>
</div>	