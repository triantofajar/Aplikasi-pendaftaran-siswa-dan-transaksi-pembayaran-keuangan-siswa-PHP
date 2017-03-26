<?php
include"../../config/koneksi.php";
require('html2fpdf.php');
ob_start();

?>
<html>
<head>
<title>Laporan Pembagian Kelas Siswa</title>

</head>
<body>
<h2 center>Pembagian Kelas Siswa Baru</h2>
<table width="100%" cellspacing="6" cellpadding="5" align="center" border="1">
    <thead>
    <tr>
        <th>No.</th>
		<th>NISN</th>
		<th>Nama</th>
		<th>Asal Sekolah</th>
		<th>Kelas</th>

    </tr>
    </thead>
	 <tbody>
    <?php
			$sql = mysql_query("SELECT tabel_nilai.*, biodata.*, kelas_siswa.*, kelas.* 
			
			from tabel_nilai 
			INNER JOIN biodata
ON tabel_nilai.id_ujian = biodata.id_utama



INNER JOIN kelas_siswa
ON tabel_nilai.id_ujian = kelas_siswa.id_siswa

INNER JOIN kelas
ON kelas.id_kelas = kelas_siswa.id_kelas

order by nama_kelas asc
			");
			$no=0;
			while ($tampil = mysql_fetch_array($sql)) {
				$no++;
				// gradasi warna
				if($no%2==1) { $warna=""; } else {$warna="#F5F5F5";}
				
				echo '<tr bgcolor='.$warna.'>';
						echo '<td  width=40px>'.$no.'</td>';	//menampilkan nomor urut
						echo '<td width=70px>'.  $tampil['nisn'].'</td>';
						echo '<td>'.$tampil['nama'].'</td>';
						echo '<td>'.$tampil['sekolah'].'</td>';
						echo '<td width=80px>'.$tampil['nama_kelas'].'</td>';
				echo '</tr>';
			}
		?>
    </tbody>
    </table>


</body>
</html>
<?php
// Output-Buffer in variable:
$html=ob_get_contents();
ob_end_clean();
$pdf=new HTML2FPDF();
$pdf->AddPage();
$pdf->WriteHTML($html);
if (preg_match("/MSIE/i", $_SERVER["HTTP_USER_AGENT"])){
    header("Content-type: application/PDF");
} else {
    header("Content-type: application/PDF");
    header("Content-Type: application/pdf");
}
$pdf->Output("sample2.pdf","I");

?>