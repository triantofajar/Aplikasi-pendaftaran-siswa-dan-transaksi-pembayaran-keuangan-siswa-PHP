<?php
include"koneksi.php";
	function _get_limit_mhs(){
		$sql = "select * from konfigurasi where nama='limit_mahasiswa'";
		$res = mysql_query($sql);
		$row = mysql_fetch_array($res);
		
		$get_limit = $row['nilai'];
		return $get_limit;}
	function _get_limit_tgl(){
		$sql = "select * from konfigurasi where nama='limit_tanggal'";
		$res = mysql_query($sql);
		while ($tampil = mysql_fetch_array($res)) {
		
		$get_limit = $tampil['nilai'];
		}
		
		return $get_limit;
	}

?>