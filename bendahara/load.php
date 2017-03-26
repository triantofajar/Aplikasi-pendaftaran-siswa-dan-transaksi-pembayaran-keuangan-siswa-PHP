<?php
include '../config/koneksi.php';

$kode_bayar = $_GET['kode_bayar'];
 
	//ambil data barang
	$query = "SELECT * FROM tbl_pembayaran WHERE kode_bayar='$kode_bayar'";
	$sql = mysql_query($query) or die (mysql_error());
	$row = mysql_fetch_assoc($sql);
	echo json_encode($row);
	
	?>