<div id="main"> <a name="TemplateInfo"></a>
<html>
	<head>
	</head>
	<body>
	<div id="content" class="col-lg-12 col-sm-12">
<ul class="breadcrumb">
            <h4>Pengaturan Pembayaran</h4>
    </ul>

<a href="admin.php?page=pembayaran.add" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-plus"></i>Tambah Pembayaran</a>

<?php
	if(isset($_POST['cari'])){


		$periode = $_POST['periode'];


		?>

		<script>
            window.location='admin.php?page=pembayaran.view&periode=<?php echo $periode; ?>';
            </script>
    <?php
        }
        ?>

<form method="POST">
<table>
	<tr>
		<td><b>Pembayaran Tahun Akademik : </b></td>
		<td>
			<select name="periode" class="form-control">
				<option>--Tahun Akademik--</option>
				<option value="2016/2017">2016/2017</option>
				<option value="2017/2018">2017/2018</option>


			</select>



		</td>
		<td><button type="submit" name="cari" class="btn btn-danger">Cari</button></td>



	</tr>


</table>
</form>

<?php
	
	if(isset($_GET['periode'])){


	$periode = $_GET['periode'];


?>

	<h5><strong>Tahun Akademik <?php echo $periode; ?></strong></h5>
    <div class="box-content">
	<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
	    <thead>
			<tr>
				<th>No.</th>
				<th>Kode Bayar</th>
				<th>Jenis Pembayaran</th>
				<th>Jumlah Harga</th>
				<th>Aksi 		</th>
			</tr>
			</thead>
			
			<tbody>
		<?php
		include "config/fungsi_rupiah.php";

			$sql = mysql_query("SELECT * FROM tbl_pembayaran WHERE periode = '$periode'");
			$no=0;
			while ($tampil = mysql_fetch_array($sql)) {
				$no++;
				// gradasi warna
				
				echo '<tr>';
					echo '<td>'.$no.'</td>';	//menampilkan nomor urut
					echo '<td>'.$tampil['kode_bayar'].'</td>';
					echo '<td>'.$tampil['jenis'].'</td>';
					echo '<td>Rp. '. format_rupiah($tampil['harga']).'</td>';
					echo '<td>

					<a href="?page=pembayaran.edit&amp;id='.$tampil['kode_bayar'].'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i></a>

					<a href="?page=kelas_hapus&amp;id='.$tampil['kode_bayar'].'" onclick="return confirm(\'Yakin?\')" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-trash"></i></a></td>';
						 	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
				echo '</tr>';
					
			}
		?>
		</tbody>
		</table>
		
		<?php
			} ?>

	</body>
</html>
</div>
