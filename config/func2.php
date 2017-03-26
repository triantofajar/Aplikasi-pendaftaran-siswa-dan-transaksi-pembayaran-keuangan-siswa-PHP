<?php

	  include "config/func.php";
	  
		function _get_batas(){
		$sql = "SELECT master.*, biodata.*, nilai.*, nisn.*
FROM master
INNER JOIN biodata
ON master.id_master = biodata.id_utama

INNER JOIN nilai
ON master.id_master = nilai.id_nilai

INNER JOIN nisn
ON master.id_master = nisn.id_nisn

limit ".$get_limit.",1 ";

		$res = mysql_query($sql);
		$row = mysql_fetch_array($res);
		
		$get_limit = $row['nilai'];
		return $get_limit;
	}

?>