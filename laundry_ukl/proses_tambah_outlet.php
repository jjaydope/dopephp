<?php
	if($_POST){
		$alamat=$_POST['alamat'];
		$telp=$_POST['telp'];
		
		if(empty($alamat)){
			echo "<script>alert('alamat outlet tidak boleh kosong');location.href='tambah_outlet.php';</script>";
		} elseif(empty($telp)){
			echo "<script>alert('no telp tidak boleh kosong');location.href='tambah_outlet.php';</script>";
		} else {
			include "koneksi.php";
			
			$insert=mysqli_query($conn,"insert into outlet (alamat,telp) value ('".$alamat."','".$telp."')");
			
			if($insert){
				echo "<script>alert('Sukses menambahkan outlet');location.href='tambah_outlet.php';</script>";
			} else {
				echo "<script>alert('Gagal menambahkan outlet');location.href='tambah_outlet.php';</script>";
			
			}
		}
		
		
	}
?>
		
