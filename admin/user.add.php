<div id="main"> <a name="TemplateInfo"></a>
<html>
	<head>
	</head>
	<body>
		<ul class="breadcrumb">
        <li>

          <b>Input User</b>
        
        </li>
    </ul>
	<div>

	</div>
		<div class="col-lg-6">
		<form action="?page=user.proses" method="post" name="postform"  enctype="multipart/form-data"> 
			<table 1 width="100%">
				<tr>
					<td>Nama User</td>
					<td><input type="text" name="nama" class="form-control"  size="50"/></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" name="TUser" class="form-control" size="50"/></td>
				</tr>
                <tr>
					<td>Password</td>
					<td><input type="password" name="TPass" class="form-control" size="50"/></td>
				</tr>
				<tr>
				<td>Akses Level</td>
				<td><select class="form-control" name="level" >
						<option value="">...
						<option value="admin"> admin</option>
						<option value="TUsaha"> TUsaha</option>
						<option value="Kasir" > Kasir</option>
						<option value="Kepala"> Kepala</option>
						<option value="Bendahara"> Bendahara</option>
						
						
					</select>      
						</td>
					</tr>
                <tr>
					<td>&nbsp;</td>
					<td><input type="submit" value="simpan" name="simpan" class="btn btn-info btn-primary"/></td>
				</tr>
			</table>
		</form>
		
	</body>
</html>
</div>