<?php
if($_POST){
$username=$_POST['username'];

$password=$_POST['password'];
if(empty($username)){
echo "<script>alert('Username tidak boleh kosong');location.href='login_pelanggan.php';</script>";
} elseif(empty($password)){
echo "<script>alert('Password tidak boleh kosong');location.href='login_pelanggan.php';</script>";
} else {
include "k0neksi.php";
$qry_login=mysqli_query($conn,"select * from customer where username = '".$username."' and password = '".md5($password)."'");
if(mysqli_num_rows($qry_login)>0){
$dt_login=mysqli_fetch_array($qry_login);
session_start();
$_SESSION['id_customer']=$dt_login['id_customer'];
$_SESSION['nama_customer']=$dt_login['nama_customer'];
$_SESSION['status_login']=true;
header("location: home_pelanggan.php");
} else {
echo "<script>alert('Username dan Password tidak benar');location.href='login_pelanggan.php';</script>";
}
}
}
?>