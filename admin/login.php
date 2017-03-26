<?php
$TUser=$_POST['TUser'];
$TPass=md5($_POST['TPass']);

$query=mysql_query("select * from tbl_user where TUser='$TUser' and TPass='$TPass'");
$cek=mysql_num_rows($query);
$row=mysql_fetch_array($query);
$id = $row['id_user'];
$TUser=$row['TUser'];

if($cek){
	$_SESSION['id_user']=$id;
	$_SESSION['TUser']=$TUser;
	header('Location:admin.php');
}else{
	?>
    <div id="main"> <a name="TemplateInfo"></a>
	<blockquote>
	  <p></p>
	  <p><font color="#FF0000">Username atau Password anda salah!!</font>. silahkan ulangi Login</p>
	  <p></p>
	</blockquote>
    </div>
	<?php
}
?>