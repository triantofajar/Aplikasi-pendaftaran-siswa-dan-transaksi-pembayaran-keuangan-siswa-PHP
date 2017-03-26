<?php
include 'config/koneksi.php';	

$TUser=$_POST['TUser'];
$TPass=md5($_POST['TPass']);

$query=mysql_query("SELECT * FROM tbl_user where TUser='$TUser' and TPass='$TPass' ") 
	   or die (mysql_error());
$cek=mysql_num_rows($query);
$row=mysql_fetch_array($query);
$id = $row['id_user'];
$TUser=$row['TUser'];
$nama=$row['nama'];
$level=$row['level'];


if($cek){
	$_SESSION['id_user']=$id;
	$_SESSION['TUser']=$TUser;
	$_SESSION['nama']=$nama;
	$_SESSION['level']=$level;

	//redirect level
		if($level == admin){
			header('Location:admin/admin.php');
		}
		elseif ($level == TUsaha){
			header('Location:TUsaha/interfaces.php');
		}
		elseif($level == Kasir){
			header('Location:kasir/interfaces.php');
		}
		elseif($level == Bendahara){
			header('Location:bendahara/interfaces.php');
		}
		elseif($level == Kepala){
			header('Location:kepala/interfaces.php');
		}
		
			
}else{
	?>
    <div id="main"> <a name="TemplateInfo"></a>
	<blockquote>
	  <p></p>
	  <p><font color="#FF0000">Username atau Password anda salah!!</font>. Silahkan ulangi Login</p>
	  <p></p>
	</blockquote>
    </div>
	<?php
}
?>