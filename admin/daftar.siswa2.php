<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
   <div id="content" class="col-lg-12 col-sm-12">
	<ul class="breadcrumb">
            <h4>Data Calon Siswa</h4>
    </ul>

 
    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
		<th>No.</th>
		<th>No. Daftar</th>
		
		<th>Nama</th>
		<th>Tanggal Lahir</th>
		<th>Alamat</th>
		<th>Usia</th>
		<th>Opsi</th>
    </tr>
    </thead>
    <tbody>
	<?php

		include "../config/func.php";
		include "fungsi_indotgl.php";
		
		//$blnth = date('Y');

		

			$sql = mysql_query("SELECT id_utama, nama, tgl_lahir, alamat, YEAR(curdate()) - YEAR(tgl_lahir) as usia FROM biodata
			
			WHERE status = 'calon'
			order by id_utama ASC
			");
			$no=0;
			while ($tampil = mysql_fetch_array($sql)) {
			$no++;
			if($no%2==1) { $warna=""; } else {$warna="#F5F5F5";}
			echo '<tr bgcolor='.$warna.'>';
				echo '<td>'.$no.'</td>';
				echo '<td>'.$tampil['id_utama'].'</td>';
				echo '<td>'.$tampil['nama'].'</td>';
				echo '<td>'.tgl_indo($tampil['tgl_lahir']).'</td>';
				echo '<td>'.$tampil['alamat'].'</td>';
				echo '<td>'.$tampil['usia'] .' thn </td>';
		
				echo '<td>
						<a href="?page=detail&amp;id='.$tampil['id_utama'].'" class="btn btn-xs btn-default" ><i class="glyphicon glyphicon-zoom-in"></i></a>
						
						<a href="?page=pendaftar_edit&amp;id='.$tampil['id_utama'].'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i></a>
						<a href="?page=pendaftar_hapus&amp;id='.$tampil['id_utama'].'" onclick="return confirm(\'Apakah yakin ingin menghapus data ini?\')" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-trash"></i></a></td>';
				echo '</tr>';
			}
	?>
    </tbody>
    </table>
    </div>
    </div>
</body>