
<div id="main"> <a name="TemplateInfo"></a>
<html>
	<head>


	</head>
	<body>
	<div class="container">
			<div class="hero-unit">
		<div id="content" class="col-lg-12 col-sm-12">
<ul class="breadcrumb">
            <h4>Tambah Pembayaran</h4>
    </ul>

		<form action="?page=pembayaran.proses" method="post" name="postform">
			<table class="table-list" width="80%" >
				<tr>
					<td>Kode Bayar</td>
					<td><input type="text" name="kode_bayar"  class="form-control" id="inputSuccess1" size="20"/></td>
				</tr>
				<tr>
					<td>Jenis Pembayaran</td>
					<td><input type="text" name="jenis"  class="form-control" id="inputSuccess1" size="50"/></td>
				</tr>
				<tr>
					<td>Jumlah Harga</td>
					<td><input type="text" name="harga"  class="form-control" id="inputSuccess1" size="50"/></td>
				</tr>

				<tr>
					<td>Tahun Akademik :</td>
					<td>
						<select name="periode" class="form-control">
						<option>--Tahun Akademik--</option>
						<option value="2016/2017">2016/2017</option>
						<option value="2017/2018">2017/2018</option>


						</select>
				</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" value="Kirim" class="btn btn-info btn-warning" name="simpan" /></td>
				</tr>
			</table>
		</form>
			
		</div>
		</div>
		 


		</tbody>
		</table>
		
	</body>
</html>
</div>