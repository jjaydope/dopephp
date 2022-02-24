<?php
if($_POST){
$nama_customer=$_POST['nama_customer'];
$tanggal_lahir=$_POST['tanggal_lahir'];
$alamat=$_POST['alamat'];
$gender=$_POST['gender'];
$nomor_telp=$_POST['nomor_telp'];
$username=$_POST['username'];
$password= $_POST['password'];
$id_produk=$_POST['id_produk'];
if(empty($nama_customer)){
echo "<script>alert('nama customer tidak boleh kosong');location.href='tambah_customer.php';</script>";
} elseif(empty($username)){
echo "<script>alert('username tidak boleh kosong');location.href='tambah_customer.php';</script>";
} elseif(empty($password)){
echo "<script>alert('password tidak boleh kosong');location.href='tambah_customer.php';</script>";
} else {
include "k0neksi.php";
$insert=mysqli_query($conn,"insert into customer (nama_customer,tanggal_lahir, gender,alamat, nomor_telp, username, password, id_produk) value
('".$nama_customer."','".$tanggal_lahir."','".$gender."','".$alamat."','".$nomor_telp."','".$username."','".md5($password)."','".$id_produk."')") or
die(mysqli_error($conn));
if($insert){
echo "<script>alert('Sukses menambahkan customer');location.href='tambah_customer.php';</script>";
}
}
}
?>