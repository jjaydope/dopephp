<?php
	if($_POST){
		$nama_user=$_POST['nama'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $role=$_POST['role'];
		
		if(empty($nama_user)){
			echo "<script>alert('nama lo egx boleh kosong');location.href='tambah_user.php';</script>";
		} elseif(empty($username)){
			echo "<script>alert('isi uname plz');location.href='tambah_user.php';</script>";
        } elseif(empty($password)){
			echo "<script>alert('pass ???');location.href='tambah_user.php';</script>";   
        } elseif(empty($role)){
			echo "<script>alert('input role !');location.href='tambah_user.php';</script>";
		} else {
			include "../koneksi.php";
			
			$insert=mysqli_query($conn,"insert into user (nama,username,password,role) value ('".$nama_user."','".$username."','".md5($password)."','".$role."')");
			
			if($insert){
				echo "<script>alert('Karyawan Baru ~');location.href='tambah_user.php';</script>";
			} else {
				echo "<script>alert('egx rejeki kalik ');location.href='tambah_user.php';</script>";
			
			}
		}
		
		
	}
?>