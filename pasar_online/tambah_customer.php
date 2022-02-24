<<html>
<head>
<link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<title></title>
</head>
<body>
<h3>Tambah Customer</h3>
<form action="proses_tambah_customer.php" method="post">
nama customer :

<input type="text" name="nama_customer" value="" class="form-
control">

Tanggal Lahir :

<input type="date" name="tanggal_lahir" value="" class="form-
control">

Gender :
<select name="gender" class="form-control">
<option></option>
<option value="Laki-Laki">Laki-Laki</option>
<option value="Perempuan">Perempuan</option>
<option value="Non-Binary">Non-Binary</option>
</select>
Alamat :
<textarea name="alamat" class="form-control"
rows="4"></textarea>
Nomor Telpon :
<input type="int" name="nomor_telp" value="" class="form-
control">

Produk :
<select name="id_produk" class="form-control">
<option></option>
<?php
include "k0neksi.php";
$qry_toko=mysqli_query($conn,"select * from toko");
while($data_toko=mysqli_fetch_array($qry_toko)){
echo '<option
value="'.$data_toko['id_produk'].'">'.$data_toko['nama_produk'].'</option>';
}
?>
</select>
Username :

<input type="text" name="username" value="" class="form-
control">

Password :

<input type="password" name="password" value="" class="form-
control">

<input type="submit" name="simpan" value="Tambah Customer"
class="btn btn-primary">
</form>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"crossorigin="anonymous"></script>
</body>
</html>
