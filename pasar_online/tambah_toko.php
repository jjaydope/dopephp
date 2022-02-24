<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
		<title></title>
	</head>
	<body>
		<h3>TAMBAH PRODUK</h3>
		<form action="proses_tambah_toko.php" method="post" enctype="multipart/form-data">
			nama produk :

			<input type="text" name="nama_produk" value="" class="form-control">

			harga :
			<input type="text" name="harga" value="" class="form-control">
			
			Foto :
			
			<!-- mulai upload file -->
			<input type="file" name="foto">
			<!-- akhir upload file -->
			
			<input type="submit" name="simpan" value="Tambah produk" class="btn btn-primary">
		</form>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"crossorigin="anonymous">
		</script>
	</body>
</html>