<?php
function selected($t1, $t2) {
	if(trim($t1) == trim($t2))
		return "selected";
	else
		return "";
}
function combo_kelas($kode) {
	echo "<option value='' selected>- Pilih Kelas -</option>";
	$query = mysql_query("SELECT id_kelas,nama_kelas  FROM kelas");
	while ($data= mysql_fetch_object($query)) {
		if ($kode == "")
			echo "<option value='$data->id_kelas'> " . $data->nama_kelas . " </option>";
		else
			echo "<option value='$data->id_kelas'" . selected($data->id_kelas, $kode) . "> " . $data->nama_kelas . " </option>";
	}
}

?>
