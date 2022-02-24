<?php
	if($_POST){
		$nama_produk=$_POST['nama_produk'];
		$harga=$_POST['harga'];
		
		//mulai upload file
		$foto = $_FILES['foto']['name'];
		$ukuran	= $_FILES['foto']['size'];
		$file_tmp = $_FILES['foto']['tmp_name'];
		//akhir upload file
		
		if(empty($nama_produk)){
			echo "<script>alert('nama produk tidak boleh kosong');location.href='tambah_toko.php';</script>";
		} elseif(empty($harga)){
			echo "<script>alert('harga tidak boleh kosong');location.href='tambah_toko.php';</script>";
		} else {
			include "k0neksi.php";
			
			//mulai upload file
			move_uploaded_file($file_tmp, 'foto/'.$foto);
			$insert=mysqli_query($conn,"insert into toko (nama_produk,harga, foto) value ('".$nama_produk."','".$harga."', '".$foto."')");
			//akhir upload file
			
			if($insert){
				echo "<script>alert('Sukses menambahkan produk');location.href='tambah_toko.php';</script>";
			} else {
				echo "<script>alert('Gagal menambahkan produk');location.href='tambah_toko.php';</script>";
			
			}
		}
		
		
	}
?>