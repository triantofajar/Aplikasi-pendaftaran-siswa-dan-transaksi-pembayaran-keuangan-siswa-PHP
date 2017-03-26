<html>
<head>
<meta charset="utf-8">
    <title>Cetak Data Siswa </title>
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
    
	<h3><center><b>Laporan Data Siswa Paud Rosella</b></center></h3>

      <br>

          <?php
          	include "../../config/koneksi.php";
		?>

						<div class="box-content">
				    <table width="97%" class="table-bordered">
				    <thead>
				    <tr>
				            <th>No.</th>
				    		<th>Nama Siswa</th>
				    		<th>Kelas</th>
				    </tr>
				    </thead>		
				    <tbody>
				        <?php
				    			$sql = mysql_query("

				    				SELECT * FROM kelas_siswa 
				    				JOIN biodata ON kelas_siswa.id_biodata = biodata.id_utama
				    				WHERE status = 'aktif'
				    				ORDER BY kelas,nama ASC 
				    		
				    			");
				    			$no=0;
				    			while ($tampil = mysql_fetch_array($sql)) {
				    				$no++;
				    				// gradasi warna
				    				if($no%2==1) { $warna=""; } else {$warna="#F5F5F5";}
				    				
				    				echo '<tr bgcolor='.$warna.'>';
				    						echo '<td>'.$no.'</td>';	//menampilkan nomor urut
				    						echo '<td>'.$tampil['nama'].'</td>';
				    						echo '<td>'.$tampil['kelas'].'</td>';
				    					
				    						
				    						 	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id


				    				echo '</tr>';
				    			}
				    		?>
				        </tbody>
				        </table>
				    	
				      
				



	</div>
</div>	
</font>
</div>
</div>
</div>

</body>
</html>




