<body>
   <div id="content" class="col-lg-12 col-sm-12">
<ul class="breadcrumb">
            <h4>Konfirmasi Pembayaran Keuangan Siswa</h4>
    </ul>

 	

    <form action="" method="POST">

    	<table>
        
    	                <tr>
    					<td>Pilih Nama</td>
    					<td>:</td>
    					
    					<td><select class="form-control" name="nama" >
    							<option value="0">--Cari Nama--
    							<?php
    							$n = mysql_query("SELECT * FROM biodata WHERE status = 'aktif' ");
    							while($k=mysql_fetch_array($n)){
    							echo "<option value=\"$k[nama]\">$k[nama]</option>\n";
    							}


    							?>
    						</select>

    					</td>
    					<td><button type="submit" class = "btn btn-info btn-danger" name="cari" >Cari</button></td>
    				</tr>
    		

    	</table>
    	
    </form>

    <?php
    if(isset($_POST['cari'])){

    	
        $nama = $_POST['nama'];
       
    ?>

        <script>
            window.location='interfaces.php?page=konfirmasi&&nama=<?php echo $nama; ?>';
            </script>
    <?php
        }
        ?>

    <?php
        if(isset($_GET['nama'])){


        ?>

    <div class="box-content">
    <br><br><br>
    <table>

    <?php
        $getnama = $_GET['nama'];
        
    
    ?>
   
 
    <td>Nama</td><td>:</td><td><?php echo $getnama; ?></td>

    </table>
    <table class="table table-striped table-bordered ">
    <thead>
    <tr>
        <th>No.</th>
		<th>Total Transaksi</th>
		<th>Tanggal Transaksi</th>
		<th>Konfirmasi</th>
    </tr>
    </thead>
    <tbody>

    <?php
    include "config/fungsi_rupiah.php";
    include "fungsi_indotgl.php";
    include "../config/koneksi.php";

		

			$sql = mysql_query("

				SELECT * FROM tbl_bayar WHERE nama = '$getnama'
                AND invoice 

			");
			
			$no=0;
			while ($tampil = mysql_fetch_array($sql)) {
				$no++;
				// gradasi warna
				if($no%2==1) { $warna=""; } else {$warna="#F5F5F5";}
				
				echo '<tr bgcolor='.$warna.'>';
						echo '<td>'.$no.'</td>';	//menampilkan nomor urut
						echo '<td> Rp. '.format_rupiah($tampil['total']).'</td>';
						echo '<td>'.tgl_indo($tampil['tgl']).'</td>';		
				
				//confirm
				$confirm = $tampil['confirm']; 

					if($confirm == 1){
							echo '<td><a href="" class="btn btn-xs btn-info btn-primary" ><i class="glyphicon "></i>Sudah DiKonfirmasi</a></td>';

						
					}elseif($confirm == 0){
						echo '<td><a href="interfaces.php?page=konfirmasi.proses&&id='.$tampil['id_bayar'].'&&nama='.$tampil['nama'].' " class="btn btn-xs btn-danger" ><i class="glyphicon "></i>Konfirmasi</a></td>';
						
						}
					

				echo '</tr>';
			}
		?>
    </tbody>
    </table>
	
    </div>

    <?php
		}
    ?>
    </div>
    </div>
    </div>
            </div>
        </div>
    </div>
	
</body>

