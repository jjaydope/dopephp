<!DOCTYPE html>
<html>
	<head>
		 <link
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"crossorigin="anonymous">
		 <title></title>
	</head>
	<body>
		 <h3>Tampil Toko</h3>
		 <table class="table table-hover table-striped">
		 <thead>
		 <tr>
		 <th>NO</th><th>NAMA PRODUK</th><th>HARGA</th>
		 <th>FOTO</th><th>AKSI</th>
		 </tr>
		 </thead>
		 <tbody>
		 <?php
		 include "k0neksi.php";
		$qry_toko=mysqli_query($conn,"select * from toko");
		 $no=0;
		 while($data_toko=mysqli_fetch_array($qry_toko)){
		 $no++;?>
		<tr> 
		<td><?=$no?></td><td><?=$data_toko['nama_produk']?></td>
		<td><?=$data_toko['harga']?></td>
		
		<!-- mulai upload file -->
		<td><img src="<?php echo "foto/".$data_toko['foto']; ?>"></td>
		<!-- akhir upload file -->
		
		<td><a
		href="ubah_customer.php?id_customer=<?=$data_toko['id_produk']?>"
		class="btn btn-success">Ubah</a> | <a
		href="hapus.php?id_customer=<?=$data_toko['id_produk']?>"
		onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
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