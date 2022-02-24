<?php
include 'koneksi.php';

$id_user=$_POST['id_user'];
$nama_user=$_POST['nama'];
$username=$_POST['username'];
$role=$_POST['role'];

$query="UPDATE user SET nama='$nama_user',username='$username',role='$role' where id_user='$id_user'";
mysqli_query($conn, $query);

if($query){
    echo "<script>alert('Sukses edit user');location.href='tampil_user.php';</script>";
    } else {
    echo "<script>alert('Gagal edit user');location.href='tampil_user.php';</script>";
    }
?>