<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
   <div id="content" class="col-lg-12 col-sm-12">
<ul class="breadcrumb">
            <h4>Laporan Data Siswa Paud Rosella</h4>
    </ul>

 
    	 <a class="btn btn-sm btn-danger" href="pdf/cetak.dataSiswa.php" target="_blank"><span class="fa fa-print"></span><i class="glyphicon glyphicon-print"></i> Cetak Laporan </a>

    <div class="box-content">

    

    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
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
				echo '</tr>';
			}
		?>
    </tbody>
    </table>
	
    </div>
    </div>
    </div>
    </div>
            </div>
        </div>
    </div>
	
</body>
</html>