<?php
	if($_POST){
		$Nama=$_POST['nama'];       
		$Alamat=$_POST['alamat'];		
		$Jenis_Kelamin=$_POST['jenis_kelamin'];
		$No_telp=$_POST['tlp'];
		
		
		if(empty($Nama)){
			echo "<script>alert('Paijo? Paimin?');location.href='tambah_member.php';</script>";
		} elseif(empty($Alamat)){
			echo "<script>alert('ya kalik gw kirim ke hutan');location.href='tambah_member.php';</script>";
        } elseif(empty($Jenis_Kelamin)){
			echo "<script>alert('kresek,nb,laki,cewe ?');location.href='tambah_member.php';</script>";  
        } elseif(empty($No_telp)){
			echo "<script>alert('masak telfon 911 ');location.href='tambah_member.php';</script>";
		} else {
			include "koneksi.php";
			
			$insert=mysqli_query($conn,"insert into member (nama,alamat,jenis_kelamin,tlp) value ('".$Nama."','".$Alamat."','".$Jenis_Kelamin."','".$No_telp."')");
			
			if($insert){
				echo "<script>alert('Sukses menambahkan member');location.href='tambah_member.php';</script>";
			} else {
				echo "<script>alert('Gagal menambahkan member');location.href='tambah_member.php';</script>";
			
			}
		}
		
		
	}
?>
		