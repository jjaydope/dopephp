<?php
if($_POST){
    $id_outlet=$_POST['id_outlet'];
    $alamat = $_POST ['alamat'];
    $telp = $_POST ['telp'];

        if(empty($alamat)||empty($telp)){
            echo "<script>alert('Semua data harus diisi!');location.href='ubah_outlet.php?id_outlet=$id_outlet'</script>";
            } else {
            include "koneksi.php";
            $query = "update outlet set alamat='$alamat',telp='$telp' where id_outlet='$id_outlet'";
            $update=mysqli_query($conn,$query);
            if($update){
                echo "<script>alert('Sukses update Outlet');location.href='tampil_outlet.php';</script>";
            } else {
            echo "<script>alert('Gagal update Outlet');location.href='ubah_outlet.php?id_outlet=".$id_outlet."';</script>";


            } 
        }
    }