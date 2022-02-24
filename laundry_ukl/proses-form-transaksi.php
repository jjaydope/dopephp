<?php
    if($_POST){
        // detail transaction
        $qty = $_POST['qty'];
        $type = $_POST['id_paket'];

        // transanction
        $member = $_POST['member'];
        $date = $_POST['tgl'];
        $deadline = $_POST['batas_waktu'];
        $date_pay = $_POST['tgl_bayar'];
        $status = $_POST['status'];
        $payment = $_POST['dibayar'];

        // session login user
        session_start();
        $user = $_SESSION['id_user'];

        include ("koneksi.php");

        if(empty($member) || empty($date) || empty($deadline) || empty($date_pay) || empty($status) || empty($payment)){
            echo "<script>alert('Harap semua data diisi dengan benar!');location.href='form-transaksi.php?total_pckg=1';</script>";

        } else {
            $insert_transaction = mysqli_query($conn,"insert into transaksi (id_member, tgl, batas_waktu, tgl_bayar, status, dibayar, id_user) value ('".$member."','".$date."','".$deadline."','".$date_pay."','".$status."','".$payment."','".$user."')");
            
            if($insert_transaction){
                echo "<script>alert('Transaksi belum ke detail!');location.href='tampil-transaksi.php';</script>";
            } else {
                echo "<script>alert('Transaksi Gagal! silakan coba kembali!');location.href='form-transaksi.php?total_pckg=1';</script>";
            }
        }

        $id_transaction = mysqli_insert_id($conn);

        for($i=0; $i<count($qty); $i++){
            $insert_dtl_transaction = mysqli_query($conn,"insert into detail_transaksi (id_transaksi, id_paket, qty) value ('".$id_transaction."','".$type[$i]."','".$qty[$i]."')");
            // echo "insert into detail_transaksi (id_transaksi, id_paket, qty) value ('".$id_transaction."','".$type[$i]."','".$qty[$i]."')";
        }

        if($insert_dtl_transaction){
            echo "<script>alert('Transaksi Sukses!');location.href='tampil-transaksi.php';</script>";
        } else {
            echo "<script>alert('Transaksi Gagal! silakan coba kembali!');location.href='form-transaksi.php?total_pckg=1';</script>";
        }
    }
?>