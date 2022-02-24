<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
		<title></title>
	</head>
	<body>
		<h3>TAMBAH USER</h3>
		<form action="proses_tambah_user.php" method="post" enctype="multipart/form-data">
            Nama User :
			<input type="varchar" name="nama" value="" class="form-control">
            Username :
            <input type="varchar" name="username" value="" class="form-control">
            Password :
            <input type="password" name="password" value="" class="form-control">

			role :
			<select name="role" class="form-control">
            <option></option>
            <option value="admin">admin</option>
            <option value="kasir">kasir</option>
			<option value="owner">owner</option>
            </select>
			
			
			<input type="submit" name="simpan" value="Tambah User" class="btn btn-primary">
		</form>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"crossorigin="anonymous">
		</script>
	</body>