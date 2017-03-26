<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
   <div id="content" class="col-lg-12 col-sm-12">
<ul class="breadcrumb">
            <h4>Kelas A-1</h4>
    </ul>

 

    <div class="box-content">

    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>No.</th>
		<th>Nama Siswa</th>
		<th>Kelas</th>
		<th>Status</th>
		<th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php
			$sql = mysql_query("

				SELECT * FROM kelas_siswa 
				JOIN biodata ON kelas_siswa.id_biodata = biodata.id_utama
				WHERE kelas = 'A-1' ORDER BY nama ASC
		
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
						echo '<td>'.$tampil['status'].'</td>';
						echo '<td>
							<a href="?page=detail_siswa&amp;id='.$tampil['id_biodata'].'" class="btn btn-xs btn-default" ><i class="glyphicon glyphicon-zoom-in"></i></a>
						
							<a href="?page=kelas_siswa_hapus&amp;id='.$tampil['id_siswa'].'&&id_utama='.$tampil['id_utama'].'" onclick="return confirm(\'Anda Yakin Ingin Menghapus ?\')" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-trash"></i></a></td>';
						 	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id


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