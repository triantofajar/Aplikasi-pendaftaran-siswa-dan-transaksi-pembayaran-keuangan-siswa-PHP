<?php
	include "../config/koneksi.php";
?>

    <head>
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
            <h4>Daftar Siswa Aktif</h4>
        </li>
    </ul>

        <form id="add" method="post">
		
		
                <div class="box-content">
	<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
	  
                <thead>
			<tr>
					<th><input type="checkbox" id="selectall"/></th>
					
								
							<th>Nama Calon Siswa</th>
							<th>Tanggal Lahir</th>			
						
				</tr>
				</thead>
				</tbody>
                <?php
                include "fungsi_indotgl.php";
                error_reporting(0);
				
					$sql = mysql_query("
				
							SELECT * FROM biodata WHERE status = 'calon'
							ORDER BY id_utama ASC
								
					 
					");
					while ($tampil = mysql_fetch_array($sql)) {
					$id = $tampil['id_utama'];
					$nama = $tampil['nama'];
					$tgl = $tampil['tgl_lahir'];
					
					
					
					
					
				?>
					<tr>
						<td><input type='checkbox' class='eachCase' name='id[<?php echo $i; ?>]' value="<?php echo $id; ?>"/></td>	
      					<td><?php echo $nama; ?></td>
						<td><?php echo tgl_indo($tgl); ?></td>
					
						
					</tr>
						
					</tbody>
				<?php
				
					}
				?>
            </table>
			<input type="submit" name="submit" class="btn btn-info btn-warning" value="Tambah">
        </form>
		<?php
		if(isset($_POST['submit'])){
			$id = implode(',',$_POST['id']);
		
				
		?>
			<script>
			window.location='?page=transaksi.form&id=<?php echo $id; ?>';
			</script>
		<?php
		}
		?>
		</div>
	</body>
</html>
