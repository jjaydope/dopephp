<?php
if($_POST){
    $id_transaksi=$_POST['id_transaksi'];
    $status = $_POST ['status'];
    $dibayar = $_POST ['dibayar'];

        if(empty($status)||empty($dibayar)){
            echo "<script>alert('Semua data harus diisi!');location.href='ubah_transaksi.php?id_transaksi=$id_'</script>";
            } else {
            include "koneksi.php";
            $query = "update transaksi set status='$status',dibayar='$dibayar' where id_transaksi='$id_transaksi'";
            $update=mysqli_query($conn,$query);
            if($update){
                echo "<script>alert('Sukses update transaksi');location.href='tampil-transaksi.php';</script>";
            } else {
            echo "<script>alert('Gagal update transaksi);location.href='ubah_transaksi.php?id_transaksi=".$id_transaksi."';</script>";


            } 
        }
    }