<html>
<head>
<meta charset="utf-8">
    <title>Cetak Kwitansi</title>
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
    
	<h3><center><b>Kwitansi Pembayaran</b></center></h3>

      <br>

      <table>
          <?php
          	include "../../config/koneksi.php";
			include "../config/fungsi_rupiah.php";
			include "../fungsi_indotgl.php";


			        	$id = $_GET['id'];
			        	$query = "SELECT * FROM kelas_siswa 
			                	  JOIN biodata ON kelas_siswa.id_biodata = biodata.id_utama
			                	  WHERE kelas_siswa.id_biodata = '$id'";
					    
					    $myQry = mysql_query($query);
					    $data = mysql_fetch_array($myQry);


					    $id = $_GET['id'];
					    $query = "SELECT * FROM biodata 
					              WHERE status = 'calon' AND id_utama = '$id' ";
					    $myQry = mysql_query($query);
					    $calon  = mysql_fetch_array($myQry);

		error_reporting(0);

		if(isset($_GET['tgl'])){

			  
			if(isset($data['nama'])) {

			  $tgl = $_GET['tgl'];
			  $sql = mysql_query("SELECT * FROM tbl_bayar
              					  WHERE nama = '".$data['nama']." ' 
              					  AND tgl = '$tgl' ");
              $row = mysql_fetch_array($sql);

             
             }

             if(isset($calon['nama'])) {

             	$tgl1 = $_GET['tgl'];
             	$sql1 = mysql_query("SELECT * FROM tbl_bayar
             	              		WHERE nama = '".$calon['nama']." ' 
             	              		AND tgl = '$tgl1' ");
             	$cal = mysql_fetch_array($sql1);
             }
         
         ?>

        <tr>
        <td>Tanggal Pembayaran</td><td>:</td><td><?php echo tgl_indo($row['tgl']),tgl_indo($cal['tgl']) ;?></td></tr>
        <?php
    	}
    	?>
        

        <?php

        if(isset($_GET['id'])){

        	$id = $_GET['id'];
        	$query = "SELECT * FROM kelas_siswa 
                	  JOIN biodata ON kelas_siswa.id_biodata = biodata.id_utama
                	  WHERE kelas_siswa.id_biodata = '$id'";
		    
		    $myQry = mysql_query($query);
		    $data = mysql_fetch_array($myQry);

		    } ?>

        <tr><td>Nama</td><td>:</td><td><?php echo $data['nama'], $calon['nama'];?></td></tr>
        <tr><td>Kelas</td><td>:</td><td><?php echo $data['kelas'];?></td></tr>
       
      </table>

			<div class="box-content">
	    <table width="97%" class="table-bordered">
	      <thead>
			<tr>
				<th>No.</th>
				<th>Jenis Pembayaran</th>
				<th>Harga</th>
				
				
			</tr>
			</thead>    
			
			<tbody>

		<?php
				$sql = mysql_query("SELECT * FROM tbl_transaksi
									WHERE nama = '".$data['nama']."' ");
				$tgl = mysql_fetch_array($sql);


		?>

		<?php
		
		//jenis pembayaran

		$invoice = $_GET['invoice'];

			$sql = mysql_query("SELECT id_trans, jenis, harga, tgl_bayar FROM tbl_transaksi 
                          		WHERE invoice = '$invoice' 
                          		");
			$no=0;
			while ($tampil = mysql_fetch_array($sql)) {
				$no++;
				// gradasi warna
				
				echo '<tr>';
					echo '<td>'.$no.'</td>';	//menampilkan nomor urut
					echo '<td>'.$tampil['jenis'].'</td>';
					echo '<td>Rp. '.format_rupiah($tampil['harga']).'</td>';
				echo '</tr>';
					
			}

		?>
			<?php

	 		//total,bayar,kembali

	 		$id = $_GET['id'];
	 		$queryBayar = "SELECT *	FROM tbl_bayar 
						   WHERE invoice = '$invoice' 
						    ";
			$hasil		= mysql_query($queryBayar) or die (mysql_error());
			$row		= mysql_fetch_array($hasil);

			?>

		
			<tr>
				<td colspan="2" pan="2" align="center"><b>Total Pembayaran</b></td>
				<td colspan="2"><b><?php echo 'Rp. '.format_rupiah($row['total']); ?></b></td>
			</tr>
			
			<tr>
				<td colspan="2" pan="2" align="center"><b>Bayar</b></td>
				<td colspan="2"><b><?php echo 'Rp. '.format_rupiah($row['bayar']); ?></b></td>

			</tr>
			<tr>
				<td colspan="2" pan="2" align="center"><b>Kembali</b></td>
				<td colspan="2"><b><?php echo 'Rp. '.format_rupiah($row['kembali']); ?></b></td>

			</tr>
			
				
		</tbody>
	</table>
	<div class="btn-group pull-right">
			
			<h5 align="center"><b>Jakarta, <?php echo tgl_indo($row['tgl']);?></b></h5>
			<h5 align="center"><b>Kasir</b></h5><br><br><br><br>

			<?php
			$str = mysql_query("SELECT kasir FROM tbl_transaksi WHERE invoice = '$invoice' ");
			$kasir = mysql_fetch_array($str);

			?>	

			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>( <?php echo $kasir['kasir']; ?> )</b>

			</div>
	</div>
</div>	
</font>
</div>
</div>
</div>

</body>
</html>




