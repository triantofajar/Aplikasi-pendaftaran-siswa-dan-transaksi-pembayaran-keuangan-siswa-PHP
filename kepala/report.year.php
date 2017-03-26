 
<ul class="breadcrumb">
            <h4>Laporan Keuangan Per Tahun</h4>
    </ul>


 <?php

 include "../config/koneksi.php";
    include "config/fungsi_rupiah.php";

      $no = 1;

            
           //year 2016
            $sqlMasuk = mysql_query("SELECT SUM(total) AS masuk FROM tbl_bayar WHERE YEAR(tgl)='2016' AND confirm = '1' ");
            
            $rowMasuk = mysql_fetch_array($sqlMasuk);

            $sqlKl= mysql_query("SELECT SUM(total) AS keluar FROM tbl_pengeluaran WHERE YEAR(tgl_keluar)='2016' AND konfirmasi = '1' ");
            
            $rowKL = mysql_fetch_array($sqlKl);


            //selisih
            $selisih = $rowMasuk['masuk'] - $rowKL['keluar'];



            //year 2017
            $sqlMasuk2 = mysql_query("SELECT SUM(total) AS masuk FROM tbl_bayar WHERE YEAR(tgl)='2017' AND confirm = '1' ");
            
            $rowMasuk2 = mysql_fetch_array($sqlMasuk2);

            $sqlKl2= mysql_query("SELECT SUM(total) AS keluar FROM tbl_pengeluaran WHERE YEAR(tgl_keluar)='2017' AND konfirmasi = '1' ");
            
            $rowKL2 = mysql_fetch_array($sqlKl2);

             //selisih2
            $selisih2 = $rowMasuk2['masuk'] - $rowKL2['keluar'];



?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No.</th>
			<th>Pendapatan</th>
			<th>Pengeluaran</th>
			<th>Tahun</th>
			<th>Selisih</th>
		</tr>

	</thead>
		<tbody>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo 'Rp. '.format_rupiah($rowMasuk['masuk']); ?></td>
				<td><?php echo 'Rp. '.format_rupiah($rowKL['keluar']); ?></td>
				<td>2016</td>
				<td><?php echo  'Rp. '.format_rupiah($selisih); ?></td>
				
			</tr>
			<tr>
				<td>2</td>
				<td><?php echo 'Rp. '.format_rupiah($rowMasuk2['masuk']); ?></td>
				<td><?php echo 'Rp. '.format_rupiah($rowKL2['keluar']); ?></td>
				<td>2017</td>
				<td><?php echo  'Rp. '.format_rupiah($selisih2); ?></td>
				
			</tr>


		</tbody> 
	

</table>