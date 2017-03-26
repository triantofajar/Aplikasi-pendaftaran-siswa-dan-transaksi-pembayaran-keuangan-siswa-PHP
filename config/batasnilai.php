<?php
include"koneksi.php";
include "func.php";
	function _get_limit_nilai(){
		$tahun = date('Y');
		$get_limit = _get_limit_mhs();
		$sql = "SELECT biodata.*, SUM(biodata.prestasi+biodata.jumlah) AS total
							FROM biodata
							where verifikasi = 'Sudah' AND date_format(biodata.tgl_daftar,'%Y') = '$tahun' 
							GROUP BY id_utama
							ORDER BY prestasi = 'u1' DESC,prestasi = 'u2' DESC,prestasi = 'u3' DESC,prestasi = 'u4' DESC, total DESC, ind DESC
							limit ".$get_limit.",1 ";
		$res = mysql_query($sql);
		$row = mysql_fetch_array($res);
		
		$get_nilai = $row['total'];
		return $get_nilai;}
?>