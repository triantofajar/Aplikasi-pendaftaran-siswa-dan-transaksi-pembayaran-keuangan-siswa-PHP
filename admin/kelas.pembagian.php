<?php
	include "../config/koneksi.php";

?>

<div id="main"> <a name="TemplateInfo"></a>
<html>
	<head>
	</head>
		<body>
	<div class="container">
			<div class="hero-unit">
		<div id="content" class="col-lg-12 col-sm-12">
<ul class="breadcrumb">
            <h4>Input Kelas Siswa</h4>
    </ul>

    <?php
    error_reporting(0);

    $nama = $_GET['nama'];
    $query = "SELECT  id_utama, nama, tgl_lahir, alamat, YEAR(curdate()) - YEAR(tgl_lahir) as usia FROM biodata WHERE nama = '$nama' ";
    $hasil = mysql_query($query) or die(mysql_error());
    $data = mysql_fetch_array($hasil);

    $usia = $data['usia'];
    ?>

		<form method="post" action="?page=pembagian.proses">
            <table class="table-list" width="70%">
                

                <input type="hidden" name="" value =<?php echo $usia; ?> />
                <tr>
                    <td>No Daftar</td>
            
                    <td><input type="text" name="id_biodata" size="50"  class="form-control" id="inputSuccess1" value="<?php echo $data['id_utama']; ?>">    
                </tr>
                


				<tr>
                    <td>Nama Siswa</td>
            
                    <td><input type="text" name="nama_siswa" size="50"  class="form-control" id="inputSuccess1" value="<?php if(isset($_GET['nama'])) echo $_GET['nama']; ?>">

                    <a href="admin.php?page=pilih_kelas"><strong>Pilih Siswa</a> 
                        
                </tr>
                    <?php

                    $sqltampung = "SELECT * FROM kelas WHERE nama_kelas = 'A-1' ";
                    $query = mysql_query($sqltampung) or die (mysql_error());
                    $tmp = mysql_fetch_array($query);

                    $tampung = $tmp['daya_tampung'];
                    
                   
                    ?>
                    <?php

                    $sqltampung2 = "SELECT * FROM kelas WHERE nama_kelas = 'B-1' ";
                    $query2 = mysql_query($sqltampung2) or die (mysql_error());
                    $tmp2 = mysql_fetch_array($query2);

                    $tampung2 = $tmp2['daya_tampung'];
                    
                   

                    ?>

                    <?php

                    //count record A1
                    $sqlcount = "SELECT COUNT(id_biodata) as nama FROM kelas_siswa WHERE kelas = 'A-1'";
                    $querycount = mysql_query($sqlcount);
                    $rows = mysql_fetch_array($querycount);

                    $countA1 = $rows['nama'];

                    
                    //count record A2
                    $sqlcount2 = "SELECT COUNT(id_biodata) as nama FROM kelas_siswa WHERE kelas = 'A-2'";
                    $querycount2 = mysql_query($sqlcount2);
                    $rows2 = mysql_fetch_array($querycount2);

                    $countA2 = $rows2['nama'];

                    


                    ?>




                    <tr>
                        <td>Kelas</td>
                        <td>
                                <select name="kelas" id="id_kelas" class="form-control">
                                <?php
                                if(!isset($_GET['nama'])){
                                ?>
                                <option>--Pilih Kelas--</option>
                                <?php

                                } ?>
                               
                                <?php

                                if(isset($_GET['nama'])){
                               
                                $kelas = mysql_query("SELECT * FROM kelas");
                                $k=mysql_fetch_array($kelas);
                                $section = $k['kelas'];


                                    if($usia < 4){
                                        if($countA1 <= $tampung){

                                            echo "<option value=A-1>A-1</option>";
                                            
                                    
                                        }else{
                                            echo "<option value=A-2>A-2</option>";
                                           
                                            }

                                        }    
                                    else{

                                        if($countA2 <= $tampung2){

                                            echo "<option value=B-1>B-1</option>";

                                        }else{
                                            echo "<option value=B-2>B-2</option>";                                        
                                    
                                            } 
                                    
                                        }


                                    }
                                ?>
                                <?php
                            //data kelas 
                            $m = mysql_query("SELECT * FROM kelas");
                            while($ks=mysql_fetch_array($m)){

                                
                             echo "<option value=\"$ks[nama_kelas]\">$ks[nama_kelas]</option>\n";

                            }
                            
                            ?>
                            </select>

                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Simpan" name="kirim" class="btn btn-info btn-danger" \/></td>

                </tr>
            </table>
        </form>
        <br><br>
        <h5> Keterangan : </h5>
        <h5> Kelas A : usia 3-4 tahun  </h5>
        <h5> Kelas B : usia 4-5 tahun  </h5>
        
           
             
	</body>
</html>
</div>
