<?php
include 'koneksi.php';

$id_member=$_POST['id_member'];
$nama_member=$_POST['nama'];
$alamat=$_POST['alamat'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$No_telp=$_POST['tlp'];

$query="UPDATE member SET nama='$nama_member',alamat='$alamat',jenis_kelamin='$jenis_kelamin',tlp='$No_telp' where id_member='$id_member'";
mysqli_query($conn, $query);

if($query){
    echo "<script>alert('Sukses edit user');location.href='pelanggan.php';</script>";
    } else {
    echo "<script>alert('Gagal edit user');location.href='pelanggan.php';</script>";
    }
?>