<?php
include "../config/koneksi.php";
include "config/fungsi_rupiah.php";
include "fungsi_indotgl.php";


error_reporting(0);
//$passacak = acak(6); 

# TOMBOL SIMPAN DIKLIK
if(isset($_POST['Simpan'])){
	# Baca Variabel Form

  $id           =$_POST['id_biodata'];
	$nama				  =$_POST['nama'];

	$kelas				=$_POST['kelas'];
	
	$tgl_bayar		=date("Y-m-d");
	$jenis				=$_POST['jenis'];
	$harga				=$_POST['harga'];
  $kasir        =$_POST['kasir'];
	


		// Simpan data dari form ke Database
		$queryInsert	= "INSERT INTO tbl_transaksi ( 
									   id_trans, nama ,kelas, tgl_bayar, jenis, harga, kasir)
							       VALUES ('$id_trans','$nama','$kelas','$tgl_bayar','$jenis','$harga','$kasir')";		

		$myQry	= mysql_query($queryInsert) or die (mysql_error());
   

		if($myQry) {
			?>
		<script type="text/javascript">
			alert("Data berhasil ditambahkan");
		</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=interfaces.php?page=transaksi.form&&id=$id'>";
					
				?>					
					
				
			<?php
		}
		exit;

  } // Penutup POST

  ?>

	<ul class="breadcrumb">
            <h4>Form Pembayaran Keuangan Siswa</h4>
    </ul>

    <?php
    // ambil data siswa
    if (isset($_GET['id'])) {
      $id = $_GET['id'];

      $query = "SELECT * FROM kelas_siswa 
                JOIN biodata ON kelas_siswa.id_biodata = biodata.id_utama
                WHERE kelas_siswa.id_biodata = '$id'";
      $myQry = mysql_query($query);
      $data  = mysql_fetch_array($myQry);


    }
    ?>


    <?php
    // ambil data calon siswa
    if (isset($_GET['id'])) {
      $id = $_GET['id'];

      $query = "SELECT * FROM biodata 
                WHERE status = 'calon' AND id_utama = '$id' ";
      $myQry = mysql_query($query);
      $calon  = mysql_fetch_array($myQry);



    }
    ?>



 <form id="newsletter" enctype="multipart/form-data"  method="post" name="postform" onsubmit="_validasi();">
   <table width="100%">
   <input type="hidden" name="kode_bayar" id="Kode">

   <input type="hidden" name="kasir" value="<?php echo $_SESSION['nama']; ?>" />


				<tr>
					<td width="140">Nama</td>
					<td><input  class="form-control" type="text" name="nama"  id="Nama" value="<?php echo $calon['nama'], $data['nama']; ?>"/>
					<a href="?page=transaksi.siswa"><strong>Siswa Aktif</a> </td>
					    
					</tr>

				
				<input type="hidden" name="id_biodata" value="<?php echo $id; ?> ">

				<tr>
					<td>Kelas</td>
					<td><input type="text" class="form-control" name="kelas" value="<?php echo $data['kelas']; ?>" /></td>
				</tr>
							
				<tr>
					<td>Jenis Pembayaran</td>
					<td><div class="form-inline">
					     <input type ="text" class="form-control" size="80" id="Jenis" name="jenis" placeholder="--Pilih Jenis Pembayaran--">
					     <span>
					        <a href="#" class="btn btn-danger" data-target="#id_tabelJenis" id="id_btnModal" data-toggle="modal">
					            <i class="glyphicon glyphicon-search"/></i>

					        </a>
					    </span>
					
					   </div>
     
					</td>
				</tr>
				<tr>
					<td>Harga</td>
					<td><input type="text" class="form-control reset" id="Harga" name="harga" readonly="readonly"/>
					</td>
					
				</tr>

				<tr>
				<td>&nbsp;</td>
				<td><button type="submit" value="Simpan" name="Simpan" class="btn btn-info btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan</button></td>
				

			</tr>
			</tr>
			
    </form>
				</table>
				<br><br>

        <?php

          if(isset($_GET['id'])) {
          
          ?>

				 <h4><center>Daftar Pembayaran Siswa Paud Rosella </center></h4>
         <style type="text/css">
            hr.style2 {
            border-top: 3px double #8c8b8b;
            }
          </style>
  
  <hr class="style2">

      <br>
      <table>
        
        
        <tr><td>Nama</td><td>:</td><td><?php echo $data['nama'], $calon['nama'] ;?></td></tr>
        <tr><td>Kelas</td><td>:</td><td><?php echo $data['kelas'];?></td></tr>
        
      </table>

			<div class="box-content">
	    <table class="table table-striped table-bordered responsive">
	    <thead>
			<tr>
				<th>No.</th>
				<th>Jenis Pembayaran</th>
				<th>Harga</th>
				<th>Hapus Item</th>
				
				
			</tr>
			</thead>
			
			<tbody>
          <?php


          if(isset($calon['nama'])){


            $sqlCalon = mysql_query("SELECT id_trans, jenis, harga, tgl_bayar FROM tbl_transaksi 
                                WHERE nama = '" . $calon['nama'] . "' 
                                AND konfirm = '0' ");
            
            $no=0;
            while ($view = mysql_fetch_array($sqlCalon)){
              $no++;
              // gradasi warna
              
              echo '<tr>';
                echo '<td>'.$no.'</td>';  //menampilkan nomor urut
                echo '<td>'.$view['jenis'].'</td>';
                echo '<td>Rp. '.format_rupiah($view['harga']).'</td>';
                echo '<td>
                    <a href="?page=transaksi.hapus&amp;id='.$view['id_trans'].'" onclick="return confirm(\'Yakin?\')" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-trash"></i></a></td>';
                    //menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
              echo '</tr>';
                
            }

          }
          
          ?>

		<?php

    if(isset($data['nama'])) {

			$sql = mysql_query("SELECT id_trans, jenis, harga, tgl_bayar FROM tbl_transaksi 
                          WHERE nama = '" . $data['nama'] . "' 
                          AND konfirm = '0' ");
      
			$no=0;
			while ($tampil = mysql_fetch_array($sql)){
				$no++;
				// gradasi warna
				
				echo '<tr>';
					echo '<td>'.$no.'</td>';	//menampilkan nomor urut
					echo '<td>'.$tampil['jenis'].'</td>';
					echo '<td>Rp. '.format_rupiah($tampil['harga']).'</td>';
					echo '<td>
							<a href="?page=transaksi.hapus&amp;id='.$tampil['id_trans'].'" onclick="return confirm(\'Yakin?\')" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-trash"></i></a></td>';
						 	
				echo '</tr>';
					
			}

    }

	?>

    </tbody>
  </table>

    <?php
       // eksekusi transaksi
        if(isset($_POST['Kirim'])){


            
            $id                 = $_POST['id_biodata'];
            $tgl_pembayaran     = $_POST['tgl'];
            $nama               = $_POST['nama'];
            $total_pembayaran   = $_POST['total_pembayaran'];
            $bayar_pembayaran   = $_POST['bayar_pembayaran'];
            $kembali_pembayaran = $_POST['kembali_pembayaran'];


            $sqlGet = mysql_query("SELECT id_trans, jenis, harga, tgl_bayar FROM tbl_transaksi 
                          WHERE nama = '" . $nama . "' 
                          AND konfirm = '0' ");

            //generate invoice
            $invoice = mt_rand(1,1000);
            
            while ($tmp = mysql_fetch_array($sqlGet)) {
            

            //update set invoice
              
             $updateInvoice = mysql_query(" UPDATE tbl_transaksi SET invoice = '$invoice' WHERE id_trans = '" . $tmp['id_trans'] . "' ");


            }
           

            $queryBayar = "INSERT INTO tbl_bayar
                          (id_biodata, nama, total, bayar, kembali, tgl, invoice)
                          VALUES('$id' ,'$nama' ,'$total_pembayaran','$bayar_pembayaran','$kembali_pembayaran','$tgl_pembayaran', '$invoice')";
                       

            $mQuery = mysql_query($queryBayar) or die (mysql_error());

            //update konfirm siswa aktif
            if(isset($data['nama'])){
            $updateBayarAktif = "UPDATE tbl_transaksi set konfirm = '1' WHERE nama = '".$data['nama']."' ";
            
            $update1 =   mysql_query($updateBayarAktif) or die (mysql_error());
            }

            //update konfirm calon siswa
            if(isset($calon['nama'])){
            $updateBayarCalon = "UPDATE tbl_transaksi set konfirm = '1' WHERE nama = '".$calon['nama']."' ";
            
            $update2 =   mysql_query($updateBayarCalon) or die (mysql_error());
            }


            ?>
              <script type="text/javascript">
                alert("Data berhasil ditambahkan");
              </script>
                
              <?php
                echo "<meta http-equiv='refresh' content='0; url=interfaces.php?page=print.view&&id=$id &&tgl=$tgl_pembayaran&&invoice=$invoice'>";
                   
      
        exit;

      }

    ?>

    <?php
         $id = $_GET['id'];
       
         $query = "SELECT * FROM tbl_bayar 
                   JOIN biodata ON tbl_bayar.id_biodata = biodata.id_utama
                   WHERE tbl_bayar.id_biodata = '$id'";
         $myQry = mysql_query($query);
         $row = mysql_fetch_array($myQry);


    ?>
    <?php
      if(isset($data['nama'])){
        $sql = mysql_query("SELECT * FROM tbl_transaksi WHERE nama = '".$data['nama']."' 
                            AND konfirm = '0'");
        $col = mysql_fetch_array($sql);
      }

      if(isset($calon['nama'])){
        $sql2 = mysql_query("SELECT * FROM tbl_transaksi WHERE nama = '".$calon['nama']."' 
                            AND konfirm = '0'");
        $col2 = mysql_fetch_array($sql2);
      }

      

    ?>

    <!--Form Pembayaran -->
    <form enctype="multipart/form-data"  method="post" name="postform" >
       <input type="hidden" name="id_biodata" value="<?php echo $id; ?>" />
       <input type="hidden" name="nama" value="<?php echo $data['nama'] ,$calon['nama']; ?>" />
       <input type="hidden" name="tgl" value="<?php echo $col['tgl_bayar'] ,$col2['tgl_bayar']; ?>" />
        
         
     
        <table class="table table-bordered responsive">
     
			<tr>

     
				<td colspan="4" pan="4" align="center"><b>Total Pembayaran ( Rp. )</b></td>
				<?php

          if(isset($data['nama'])) {

					$sum = mysql_query("SELECT SUM(harga) as total FROM tbl_transaksi
                              WHERE nama = '".$data['nama']."' 
                              AND konfirm = '0' ");
					$data = mysql_fetch_array($sum);

          }
		    ?>
                <?php

                  if(isset($calon['nama'])) {

                  $sum = mysql_query("SELECT SUM(harga) as total FROM tbl_transaksi
                                      WHERE nama = '".$calon['nama']."' 
                                      AND konfirm = '0' ");
                  $data = mysql_fetch_array($sum);

                  }
                ?>
                

				<td colspan="4"><b><input type="text"  class="form-control" id="total" name="total_pembayaran" value=" <?php echo $data['total'] ,$calon['total']; ?>" readonly="readonly" /></b></td>
			</tr>
      
      <tr>
            <td colspan="4"><b>Bayar ( Rp. )</b></td>
            <td colspan="4"><b><input type="text"  class="form-control" id = "bayar" name="bayar_pembayaran"  /></b></td>
          
      </tr>
      <tr>
            <td colspan="4"><b>Kembali ( Rp. )</b></td>
            <td colspan="4"><b><input type="text"  class="form-control input-lg" id = "kembali" name="kembali_pembayaran" placeholder = "0" readonly="readonly" /></b></td>
          
      </tr>

     </table>

     <div class="btn-group pull-right">
     <tr>
     <td><button type="submit" value="Kirim" name="Kirim" class="btn btn-info btn-primary"><i class="glyphicon glyphicon-upload"></i> Kirim</button></td>
          </tr>
     </div>
    </form>
			      
</form>
	
  <?php
    } 
  ?>

  
  <script type="text/javascript">
 
        var total_form = document.getElementById('total');
        var total = parseInt(total_form.value);
        

        var bayar_form = document.getElementById('bayar');

        
        bayar_form.onkeyup = function(){

          var total_form = document.getElementById('total');
          var total = parseInt(total_form.value);
        

          var bayar_form = document.getElementById('bayar');
          var bayar = parseInt(bayar_form.value);

          var kembali_form = document.getElementById('kembali');
          var kembali = parseInt(kembali_form.value);

          var kembalian = 0 ;
          kembalian = bayar - total;

          kembali_form.value = kembalian;
          }

</script> 




<!--  MODAL Data Karyawan -->

<div class="modal fade draggable-modal" id="id_tabelJenis" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-full">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Pilih Jenis Pembayaran</h4>
            </div>
            <br>
            <div class="row space-form ">
   <div class="col-sm-4">
    <div class="input-group">
     

    </div>
  </div>
</div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_Reload" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" id="bayar">
                                    <thead>
                                        <tr>
                                        <th class="bg-danger">NO</th>
                                        <th class="bg-danger">KODE BAYAR</th>                                        
                                        <th class="bg-danger">JENIS PEMBAYARAN</th>                                       
                                        <th class="bg-danger">HARGA</th>    
                                        <th class="bg-danger">FUNGSI</th>                                                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     
                                                                          
                                        $query = "SELECT * FROM tbl_pembayaran ORDER BY kode_bayar ASC";
                                        $tampil=mysql_query($query);
                                      
                                      ?>
                                      <?php

                                      $no = 1;

                                      $count = mysql_num_rows($tampil);

                                        while($data=mysql_fetch_array($tampil)){

                                      ?>
                                        
                                        <tr>
                                          <td><?php echo $no++; ?></td>
                                          <td class="td_kode"><?php echo $data['kode_bayar']; ?></td>
                                          <td class="td_jenis"><?php echo $data['jenis']; ?></td>
                                         
                                          <td class="td_harga"><?php echo 'Rp. '.format_rupiah($data ['harga']); ?>
                                          		<input type="hidden" class="input_td_harga" value="<?php echo $data['harga'] ?>" />
                                          </td>
                                          <td><button class='td_btn btn btn-primary btn-custom dis'>Pilih</button></td>
                                        </tr>
									
                                      <?php
                                        
                                      }
                                      
                                      ?>
                                    </tbody>
                                    <tfoot>


                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- end col-12 -->
                    </div>
                    <!-- END ROW-->
                </div>
                <!-- END SCROLLER-->
            </div>
            <!-- END MODAL BODY-->
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal" id="btnCloseModalDataUser">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  END  MODAL Data Karyawan -->


<!--  MODAL Data Karyawan -->
<div class="modal fade draggable-modal" id="id_tabelCalon" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-full">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Calon Siswa</h4>
            </div>
            <br>
            <div class="row space-form ">
   <div class="col-sm-4">
    <div class="input-group">
    

    </div>
  </div>
</div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_Reload" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" id="bayar">
                                    <thead>
                                        <tr>
                                        <th class="bg-danger">NO</th>
                                        <th class="bg-danger">NO DAFTAR</th>                                        
                                        <th class="bg-danger">NAMA CALON SISWA</th>                                       
                                        <th class="bg-danger">TANGGAL LAHIR</th>    
                                        <th class="bg-danger">FUNGSI</th>                                                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     
                                                                          
                                        $query = "SELECT * FROM biodata WHERE status = 'calon' 
                                                  ORDER BY id_utama ASC";
                                        $tampil=mysql_query($query);
                                      
                                      ?>
                                      <?php
                                      	

                                      $no = 1;

                                      $count = mysql_num_rows($tampil);

                                        while($data=mysql_fetch_array($tampil)){

                                      ?>
                                        
                                        <tr>
                                          <td><?php echo $no++; ?></td>
                                          <td class="td_id"><?php echo $data['id_utama']; ?></td>
                                          <td class="td_nama"><?php echo $data['nama']; ?></td>
                                         
                                          <td class="td_tgl"><?php echo tgl_indo($data['tgl_lahir']); ?>
                                                                                    </td>
                                          <td><button class='td_btn btn btn-primary btn-custom dis'>Pilih</button></td>
                                        </tr>
									
                                      <?php
                                        
                                      }
                                      
                                      ?>
                                    </tbody>
                                    <tfoot>


                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- end col-12 -->
                    </div>
                    <!-- END ROW-->
                </div>
                <!-- END SCROLLER-->
            </div>
            <!-- END MODAL BODY-->
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal" id="btnCloseModalDataUser">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  END  MODAL Data Karyawan -->


    <!--/span-->
<script>
    $('.td_btn').click(function(event){

    		event.preventDefault();

            var kode = $(this).closest('tr').find('.td_kode').text();
            var jenis = $(this).closest('tr').find('.td_jenis').text();
            var harga = $(this).closest('tr').find('.input_td_harga').val();
            $('#Jenis').val(jenis);
            $('#Harga').val(harga);
            $('#Kode').val(kode);
           
            $('#id_tabelJenis').modal('hide');
    });
</script>

<!-- JQuery Search -->
  <script type="text/javascript">
    $(document).ready(function()
  {
    $('#search').keyup(function()
    {
      searchTable($(this).val());
    });
  });

  function searchTable(inputVal)
  {
    var table = $('#bayar');
    table.find('tr').each(function(index, row)
    {
      var allCells = $(row).find('td');
      if(allCells.length > 0)
      {
        var found = false;
        allCells.each(function(index, td)
        {
          var regExp = new RegExp(inputVal, 'i');
          if(regExp.test($(td).text()))
          {
            found = true;
            return false;
          }
        });
        if(found == true)$(row).show();else $(row).hide();
      }
    });
  }
  </script>

  <!--/span-->


<!--/modal data calon siswa-->

<script>
    $('.td_btn').click(function(event){

    		event.preventDefault();

            var id = $(this).closest('tr').find('.td_id').text();
            var nama = $(this).closest('tr').find('.td_nama').text();
            var tgl = $(this).closest('tr').find('.td_tgl').val();
            $('#ID').val(id);
            $('#Tgl').val(tgl);
           
            $('#id_tabelCalon').modal('hide');
    });
</script>

<!-- JQuery Search -->
  <script type="text/javascript">
    $(document).ready(function()
  {
    $('#search').keyup(function()
    {
      searchTable($(this).val());
    });
  });

  function searchTable(inputVal)
  {
    var table = $('#bayar');
    table.find('tr').each(function(index, row)
    {
      var allCells = $(row).find('td');
      if(allCells.length > 0)
      {
        var found = false;
        allCells.each(function(index, td)
        {
          var regExp = new RegExp(inputVal, 'i');
          if(regExp.test($(td).text()))
          {
            found = true;
            return false;
          }
        });
        if(found == true)$(row).show();else $(row).hide();
      }
    });
  }
  </script>

  
 
</body>
</html>

<!--  untuk membatu menampilkan tanggal -->
	<iframe width=174 height=189 name="gToday:normal:./calender/agenda.js" id="gToday:normal:./calender/agenda.js" src="./calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe>
	
	
