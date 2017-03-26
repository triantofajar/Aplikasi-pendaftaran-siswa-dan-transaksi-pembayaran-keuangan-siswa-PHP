<div id="main"> <a name="TemplateInfo"></a>
<html>
	<head>
	</head>
	<body>
	<div id="content" class="col-lg-12 col-sm-12">
<ul class="breadcrumb">
            <h4>Pengaturan Kelas</h4>
    </ul>

<a href="admin.php?page=kelas_add" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-plus"></i>Tambah Kelas</a>
    <div class="box-content">
	<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
	    <thead>
			<tr>
				<th>No.</th>
				<th>Kode Kelas</th>
				<th>Nama Kelas</th>
				<th>Daya Tampung</th>
				<th>Aksi 		</th>
			</tr>
			</thead>
			
			<tbody>
		<?php
			$sql = mysql_query("SELECT * FROM kelas");
			$no=0;
			while ($tampil = mysql_fetch_array($sql)) {
				$no++;
				// gradasi warna
				
				echo '<tr>';
					echo '<td>'.$no.'</td>';	//menampilkan nomor urut
					echo '<td>'.$tampil['id_kelas'].'</td>';
					echo '<td>'.$tampil['nama_kelas'].'</td>';
					echo '<td>'.$tampil['daya_tampung'].'</td>';
					echo '<td>
							<a href="?page=kelas_edit&amp;id='.$tampil['id_kelas'].'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i></a>
						<a href="?page=kelas_hapus&amp;id='.$tampil['id_kelas'].'" onclick="return confirm(\'Apakah yakin ingin menghapus ?\')" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-trash"></i></a></td>';
						 	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
				echo '</tr>';
					
			}
		?>
		</tbody>
		</table>
		

	</body>
</html>
</div>
