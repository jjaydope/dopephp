<?php
if($_POST) {
    $id_transaksi = $_POST['id_transaksi'];
    $id_paket = $_POST['id_paket'];
    $qty = $_POST['qty'];

    include "koneksi.php";
    $qry_harga = mysqli_query($conn, " SELECT * from paket where id_paket = '$id_paket'");
    $data_harga=mysqli_fetch_array($qry_harga);
    $harga = $data_harga['harga'];
    
    $subtotal = $qty * $harga;

    if(empty($id_transaksi)) {
        echo "<script>alert('id transaksi tidak boleh kosong');location.href='tambah_detail_transaksi.php';</script>";
    } elseif(empty($id_paket)) {
        echo "<script>alert('id paket tidak boleh kosong');location.href='tambah_detail_transaksi.php';</script>";
    } elseif(empty($qty)) {
        echo "<script>alert('qty tidak boleh kosong');location.href='tambah_detail_transaksi.php';</script>";
    } else {

        $abc = mysqli_query($conn, "INSERT INTO `detail_transaksi` ( `id_transaksi`, `id_paket`, `qty`, `subtotal`) VALUES ('".$id_transaksi."', '".$id_paket."', '".$qty."', '".$subtotal."')");

        if($abc) {  
            echo "<script>alert('Sukses menambahkan data detail transaksi');location.href='tambah_detail_transaksi.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data detail transaksi');location.href='tambah_detail_transaksi.php';</script>";
        }
    }
}
?>