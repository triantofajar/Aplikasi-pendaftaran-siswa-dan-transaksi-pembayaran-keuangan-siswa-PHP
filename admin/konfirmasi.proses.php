<?php

$id = $_GET['id'];


$updateConfirm  = "UPDATE tbl_bayar SET confirm = '1' WHERE id_bayar = '$id'";
$query = mysql_query($updateConfirm) or die (mysql_error());


$nama = $_GET['nama'];

?>
<script>
    window.location='admin.php?page=konfirmasi&&nama=<?php echo $nama; ?>';
    </script>
