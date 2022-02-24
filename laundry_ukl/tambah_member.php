
<?php 
session_start();
if($_SESSION['role'] !='admin'){
	echo "<script>alert('Role tidak benar');location.href='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
		<title></title>
	</head>
	<body>
	<?php
	include "header.php";
	?>
	<html lang="en">
		<h3>TAMBAH MEMBER</h3>
		<form action="proses_tambah_member.php" method="post" enctype="multipart/form-data">
        Nama:
			<input type="varchar" name="nama" value="" class="form-control">
        Alamat:
			<input type="text" name="alamat" value="" class="form-control">    

        Jenis Kelamin

			<select name="jenis_kelamin" class="form-control">
            <option></option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
            <option value="Non-binary">Non-Binary</option>
            </select>

        No Telp:
			<input type="varchar" name="tlp" value="" class="form-control">
			
			
			<input type="submit" name="simpan" value="Tambah Member" class="btn btn-primary">
		</form>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"crossorigin="anonymous">
		</script>
	</body>
</html>