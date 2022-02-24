<?php
if($_POST){
    $id_paket=$_POST['id_paket'];
    $jenis = $_POST ['jenis'];
    $harga = $_POST ['harga'];

        if(empty($jenis)||empty($harga)){
            echo "<script>alert('Semua data harus diisi!');location.href='ubah_paket.php?id_paket=$id_paket'</script>";
            } else {
            include "koneksi.php";
            $query = "update paket set jenis='$jenis',harga='$harga' where id_paket='$id_paket'";
            $update=mysqli_query($conn,$query);
            if($update){
                echo "<script>alert('Sukses update produk');location.href='tampil_paket.php';</script>";
            } else {
            echo "<script>alert('Gagal update produk');location.href='ubah_paket.php?id_paket=".$id_paket."';</script>";


            } 
        }
    }