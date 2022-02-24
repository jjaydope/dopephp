<?php
    if($_GET['id_toko']){
    include "k0neksi.php";
    $qry_hapus = mysqli_query($conn,"delete from toko where id_produk='".$_GET['id_produk']."'");

    if ($qry_hapus) {
        echo "<script>alert('Sukses hapus data');location.href='tampil_produk.php';</script>";
    } else {
    echo "<script>alert('Gagal hapus data');location.href='./dashboard.php';</script>";
    }
  }
?>