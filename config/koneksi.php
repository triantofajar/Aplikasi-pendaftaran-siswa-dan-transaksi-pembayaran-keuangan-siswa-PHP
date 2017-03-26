<?php
$host="localhost";
$user="root";
$password="";
$database="rosella";



$koneksi=mysql_connect($host,$user,$password);
mysql_select_db($database,$koneksi);

if($koneksi){
	
}else{
	echo "gagal koneksi";
}



?>