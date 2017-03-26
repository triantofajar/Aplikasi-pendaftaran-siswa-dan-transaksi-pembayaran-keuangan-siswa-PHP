<div id="main"> <a name="TemplateInfo"></a>
<html>
	<head>
	</head>
	<body>     
	
<ul class="breadcrumb">
            <h4>Manajemen User</h4>
    </ul>
	                    <div class="col-lg-6">
                 
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
										<th>Username</th>
										<th>Nama</th>
										<th>Akses Level</th>
										<th>Opsi</th>
                                    </tr>
                                </thead>
								<tbody>
								<?php
			$sql = mysql_query("SELECT * FROM tbl_user");
			$no=0;
			while ($tampil = mysql_fetch_array($sql)) {
				$no++;
				// gradasi warna
				if($no%2==1) { $warna=""; } else {$warna="#F5F5F5";}
				
				echo '<tr bgcolor='.$warna.'>';
						echo '<td>'.$no.'</td>';	//menampilkan nomor urut
						echo '<td>'.$tampil['TUser'].'</td>';
						echo '<td>'.$tampil['nama'].'</td>';
						echo '<td>'.$tampil['level'].'</td>';
						echo '<td><a href="?page=user.edit&amp;id_user='.$tampil['id_user'].'x" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i></a>
							
							<a href="?page=user.hapus&amp;id_user='.$tampil['id_user'].'" onclick="return confirm(\'Anda yakin ingin menghapus ?\')" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-trash"></i></a></td>';
							  	//menampilkan link edit dan hapus dimana tiap link terdapat GET id 
				echo '</tr>';
			}
		?>
                               </tbody>                              
                            </table>
							<form  method="post" action="?page=adm.add">
           	
			<a href="?page=user.add" class="btn btn-info btn-danger">Tambah</a>
		</form>
                        </div>
                    </div>
					    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h3>Tambah 	User</h3>
                </div>
                <div class="modal-body">
				
				<form action="?page=adm.proses" method="post" name="postform">
			<table class="table-list" width="100%">
				<tr>
					<td>Nama User</td>
					<td><input type="text" name="nama"  size="50"/></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" name="id_user"  size="50"/></td>
				</tr>
                <tr>
					<td>Password</td>
					<td><input type="password" name="password"  size="50"/></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" value="Simpan" name="simpan" class="btn btn-primary"/></td>
				</tr>

			</table>
			
		</form>
				
                </div>
                
            </div>
        </div>
    </div>
</body></html>
</div>

