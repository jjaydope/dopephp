<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
<title></title>
</head>
<body>
<h3>Tampil Customer</h3>
<table class="table table-hover table-striped">
<thead>
<tr>
<th>NO</th><th>NAMA Customer</th><th>TANGGAL LAHIR</th>

<th>ALAMAT</th><th>NOMOR TELP</th><th>GENDER</th>
<th>USERNAME</th><th>PRODUK</th><th>AKSI</th>

</tr>
</thead>
<tbody>
<?php
include "k0neksi.php";

$qry_customer=mysqli_query($conn,"select * from customer join toko on toko.id_produk=customer.id_produk");

$no=0;
while($data_customer=mysqli_fetch_array($qry_customer))
{$no++;?>
<tr>
<td><?=$no?></td><td><?=$data_customer['nama_customer']?></td>
<td><?=$data_customer['tanggal_lahir']?></td>
<td><?=$data_customer['alamat']?></td><td><?=$data_customer['nomor_telp']?></td><td><?=$data_customer['gender']?>
</td>
 <td><?=$data_customer['username']?>
</td>
<td><?=$data_customer['nama_produk']?>
</td >
<td><a
href="ubah_customer.php?id_produk=<?=$data_customer['id_produk']?>"
class="btn btn-success">Ubah</a> | <a
href="hapus_customer.php?id_produk=<?=$data_customer['id_produk']?>"
onclick="return confirm('Apakah anda yakin menghapus dataini?')" class="btn btn-danger">Hapus</a></td>

</tr>
<?php
}
?>
</tbody>
</table>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"crossorigin="anonymous"></script>
</body>
</html>