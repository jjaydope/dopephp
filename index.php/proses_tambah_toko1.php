<?php
	if($_POST){
		$nama_toko=$_POST['nama_toko'];
		$kategori=$_POST['kategori'];
		if(empty($nama_toko)){
			echo "<script>alert('nama toko tidak boleh kosong');location.href='tambah_toko.php';</script>";
		} elseif(empty($kategori)){
			echo "<script>alert('kategori tidak boleh kosong');location.href='tambah_toko.php';</script>";
		} else {
			include "k0neksi.php";
			$insert=mysqli_query($conn,"insert into toko (nama_toko,kategori) value ('".$nama_toko."','".$kategori."')");
			if($insert){
				echo "<script>alert('Sukses menambahkan toko');location.href='tambah_toko.php';</script>";
			} else {
				echo "<script>alert('Gagal menambahkan toko');location.href='tambah_toko.php';</script>";
			// echo "insert into toko (nama_toko,kategori) value ('".$nama_toko."','".$kategori."')";
			}
		}
	}
?>