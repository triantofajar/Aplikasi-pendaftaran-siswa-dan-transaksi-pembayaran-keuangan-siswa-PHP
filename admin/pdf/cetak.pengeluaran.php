<html>
<head>
<meta charset="utf-8">
    <title>Cetak Pengeluaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <link id="bs-css" href="../css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="../css/charisma-app.css" rel="stylesheet">
    <link href='../bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='../bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='../bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='../bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='../bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='../bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    
    <link href='../css/jquery.noty.css' rel='stylesheet'>
    <link href='../css/noty_theme_default.css' rel='stylesheet'>
    <link href='../css/elfinder.min.css' rel='stylesheet'>
    <link href='../css/elfinder.theme.css' rel='stylesheet'>
    <link href='../css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='../css/uploadify.css' rel='stylesheet'>
    <link href='../css/animate.min.css' rel='stylesheet'>

</head>
<body onload="window.print()">
<div class="panel panel-default">
	<div class="panel-body">
		<div class="row-table-bordered">
						
					
							
							<div class="col-md-2">
							<img src="../../media/images/logo paud.png" class="img-responsive pull-left" style="max-height:120px;display:inline">

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
          	include "../../config/koneksi.php";
			include "../config/fungsi_rupiah.php";
			include "../fungsi_indotgl.php";

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

				<div class="btn-group pull-right">
						
						<h5 align="center"><b>Jakarta, <?php echo tgl_indo($tgl['tgl_keluar']);?></b></h5>
						<h5 align="center"><b>Bendahara</b></h5><br><br><br><br><br><br>

						<?php
						$str = mysql_query("SELECT bendahara FROM tbl_pengeluaran WHERE invoice = '$invoice' ");
						$term = mysql_fetch_array($str);

						?>	

						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>( <?php echo $term['bendahara']; ?> )</b>

						</div>
				<div class="btn-group pull-left">
					<br>
						
						<h5 align="center"><b>Mengetahui</b></h5>
						<h5 align="center"><b>Kepala Paud Rosella</b></h5><br><br><br><br><br>

						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>( Hj.Fahmalia )</b>

						</div>




	</div>
</div>	
</font>
</div>
</div>
</div>

</body>
</html>




