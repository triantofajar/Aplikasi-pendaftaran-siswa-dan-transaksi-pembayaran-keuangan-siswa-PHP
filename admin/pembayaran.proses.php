<div id="main"> <a name="TemplateInfo"></a>
<?php

error_reporting(0);	

if(isset($_POST['simpan'])){
	$kode_bayar=$_POST['kode_bayar'];
	$jenis=$_POST['jenis'];
	$harga=$_POST['harga'];
	$periode=$_POST['periode'];


	
	
	$query=mysql_query("insert into tbl_pembayaran(kode_bayar,jenis,harga,periode) 
						values('$kode_bayar','$jenis','$harga','$periode')");
						
				if($query){
				
					
			echo "<meta http-equiv='refresh' content='0; url=admin.php?page=pembayaran.view'>"; 
					
				}
		
}else{
	unset($_POST['simpan']);
}
?>
</div>