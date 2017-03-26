  
<?php
include "fungsi_indotgl.php";
include "../config/koneksi.php";
//cek dahulu, jika tombol simpan di klik


	$id	= $_GET['id'];
	$mySql	= "SELECT * FROM kelas_siswa 
            JOIN biodata ON kelas_siswa.id_biodata = biodata.id_utama
            WHERE kelas_siswa.id_biodata = '$id' ";

	$myQry	= mysql_query($mySql) or die (mysql_error());
	$myData	= mysql_fetch_array($myQry);

  
  $tgl = tgl_indo ($myData['tgl_lahir']);


?>




   <div id="content" class="col-lg-12 col-sm-12">
<div class="row">
    <div class="box col-md-6">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Profil </h2>


    </div>
    <div class="box-content">
    <div class="alert alert-info"><h2><strong><?php echo $myData['nama']; ?></strong></h2>
	  <h4>Kelas : <?php echo $myData['kelas']; ?></h4></div>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
     <center><img src="../photo/<?php echo $myData['photo']; ?>" width="150" height="200" style="border:2px solid"/>

  <table>
 
    <tr>
      <td>Tempat, Tgl Lahir</td>
	  <td>:</td>
      <td><?php echo $myData['tempat_lahir']; ?>, <?php echo $tgl ?>
	  </td>
    </tr>
    <tr>
      <td>Alamat Lengkap</td>
	  <td>:</td>
      <td><?php echo $myData['alamat']; ?></td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
	  <td>:</td>
      <td><?php echo $myData['jenis_kel']; ?></td>
    </tr>
    <tr>
      <td>Agama</td>
	  <td>:</td>
      <td><?php echo $myData['agama']; ?>
	  </td>
    </tr>
    
    <tr>
      <td>No. Telepon</td>
	  <td>:</td>
      <td><?php echo $myData['telepon']; ?>
    </tr>

    <tr>
      <td>Nama Ayah</td>
	  <td>:</td>
      <td><?php echo $myData['ayah']; ?></td>
    </tr>
    <tr>
      <td>Pekerjaan Ayah</td>
  <td>:</td>    <td><?php echo $myData['kerja_ayah']; ?></td>
    </tr>
    <tr>
      <td>Nama Ibu</td>
	  <td>:</td>
      <td><?php echo $myData['ibu']; ?></td>
    </tr>
    <tr>
     

  </table>
 </thead>
 </table>
</div>
</div>
</div>
   





