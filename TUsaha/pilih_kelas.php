<?php
	include "../config/koneksi.php";
?>
<!DOCTYPE html>
    <html>
    <head>
    <title>Pilih Siswa</title>
	<script src="js/jqeuery-2.0.2.js"></script>
	<script src="js/jqueery-ui-1.10.1.custom.js"></script>
    <script>    
		$(document).ready(function(){
			$("#selectall").click(function () { //untuk checkbox
				if($(this).is(":checked")==false){ //jika checkbox tidak dicentang
					$(".eachCase").prop("checked",false);
				}else{
					$(".eachCase").prop("checked",true); //jika checkbox dicentang
				}
			});
		 
			$(".eachCase").click(function(){ //untuk men-check list semua checkbox
				if($(".eachCase").length == $(".eachCase:checked").length) {
					$("#selectall").attr("checked", "checked");
				} else {
					$("#selectall").removeAttr("checked");
				}
			}); 
			
			$("form input[ideko='hapus']").click(function() {  // jika tombol hapus diklik
				var count_checked = $("[name='eachCase[]']:checked").length; // menghitung checkbox yang dicentang 
				if(count_checked == 0) {
					alert("Silahkan pilih data yang ingin dihapus");
					return false;
				}else{
					confirm("Apakah anda yakin akan menghapus data-data yang anda pilih");
				} 
			});
		});
	</script> 
    </head>
    
    <body>
	<div class="container">
			<div class="hero-unit">
		<div id="content" class="col-lg-10 col-sm-12">
<ul class="breadcrumb">
        <li>
            <h4>Pilih Siswa</h4>
        </li>
    </ul>

        <form id="add" method="post">
		
		
                <div class="box-content">
	<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
	  
                <thead>
			<tr>
					<th><input type="checkbox" id="selectall"/></th>
					
							<th>No. Daftar</th>	
							<th>Nama</th>
							<th>Tanggal Lahir</th>
							<th>Usia</th>
							
							
						
				</tr>
				</thead>
				</tbody>
                <?php
                include "fungsi_indotgl.php";
				$i=1;
					$sql = mysql_query("
							
							SELECT  id_utama, nama, tgl_lahir, alamat, YEAR(curdate()) - YEAR(tgl_lahir) as usia FROM biodata where status = 'calon'
					
					
					 
					");
					while ($tampil = mysql_fetch_array($sql)) {
					$id_utama = $tampil['id_utama'];
					$nama = $tampil['nama'];
					$tgl_lahir = $tampil['tgl_lahir'];
					$usia = $tampil['usia'];
					
					
					
					
				?>
					<tr>
						<td><input type='checkbox' class='eachCase' name='nama[<?php echo $i; ?>]' value="<?php echo $nama; ?>"/></td>	
                        <td><?php echo $id_utama; ?></td>
						<td><?php echo $nama; ?></td>
						<td><?php echo tgl_indo($tgl_lahir); ?></td>
						<td><?php echo $usia ; ?> thn</td>
						
					</tr>
						
					</tbody>
				<?php
				$i++;
					}
				?>
            </table>
			<input type="submit" name="submit" class="btn btn-info btn-warning" value="Tambah">
        </form>
		<?php
		if(isset($_POST['submit'])){
			$nama = implode(',',$_POST['nama']);
			$usia;
			
		?>
			<script>
			window.location='?page=kelas.pembagian&nama=<?php echo $nama; ?>';
			</script>
		<?php
		}
		?>
		</div>
	</body>
</html>
