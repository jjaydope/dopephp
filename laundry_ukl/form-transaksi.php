<?php 
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry | Transaksi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</head>
<body>
<?php
	include "header.php";
    if($_SESSION['role'] =='owner'){
        echo "<script>alert('Role tidak benar');location.href='home.php';</script>";
    }
	?>
    <main class="form-signin">
        <h1 class="h3 fw-normal text-center">Transaksi</h1>
        <form action="form-transaksi.php" method="get">
            <div class="relative mt-5">
            <label for="total_pckg">Jumlah Pemesanan</label>
            <div class="d-flex">
                <input type="number" name="total_pckg" id="total_pckg" class="form-control" value="<?=$_GET['total_pckg'] ? $_GET['total_pckg'] : 1  ?>" min="1" />
                <button type="submit" class="w-24 m-1 btn btn-lg btn-primary"><i class="bi bi-arrow-clockwise"></i></button>
            </div>
            </div>
        </form>
        <form action="proses-form-transaksi.php" method="post">
            <div>
                <label for="member" class="form-label">Pelanggan</label>
                <select name="member" id="member" class="form-select">
                    <option disabled>Pilih Nama Pelanggan</option>
                    <?php
                        include "koneksi.php";
                        $qry_member=mysqli_query($conn,"select * from member");
                        while($data_member=mysqli_fetch_array($qry_member)){
                            echo '<option value="'.$data_member['id_member'].'">'.$data_member['nama'].'</option>';    
                        }
                        ?>
                </select>
            </div>
            <div>
                <label for="tgl" class="form-label">Tanggal Pemesanan</label>
                <input type="date" class="form-control" id="tgl" name="tgl">
            </div>
            <div>
                <label for="batas_waktu" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control" id="batas_waktu" name="batas_waktu">
            </div>
            <div>
                <label for="tgl_bayar" class="form-label">Tanggal Bayar</label>
                <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar">
            </div>
            <div>
                <label for="status" class="form-label">Status Pengerjaan</label>
                <select name="status" id="status" class="form-select">
                    <option disabled selected>Pilih Status Pengerjaan</option>
                    <option value="baru">Baru</option>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                    <option value="diambil">Diambil</option>
                </select>
            </div>
            <div>
                <label for="dibayar" class="form-label">Status Pembayaran</label>
                <select name="dibayar" id="dibayar" class="form-select">
                    <option disabled selected>Pilih Status Pembayaran</option>
                    <option value="dibayar">Dibayar</option>
                    <option value="belum_dibayar">Belum Dibayar</option>
                </select>
            </div>
            <?php for($index = 0; $index < ($_GET['total_pckg'] ? $_GET['total_pckg'] : 1); $index++) : ?>
            <div>
                <label for="jenis" class="form-label">Jenis Paket</label>
                <select name="id_paket[]" id="id_paket[]" class="form-select">
                    <option disabled selected>Jenis Kategori Laundry</option>
                    <?php
                        include "koneksi.php";
                        $qry_packg=mysqli_query($conn,"select * from paket");
                        while($data_packg=mysqli_fetch_array($qry_packg)){
                            echo '<option value="'.$data_packg['id_paket'].'">'.$data_packg['jenis'].'</option>';    
                        }
                    ?>
                </select>
            </div>
            <label for="qty" class="form-label">Kuantitas</label>
            <div class="form-floating">
                    <div class="d-flex">
                        <input type="number" class="form-control" id="qty[]" name="qty[]">
                        <span class="align-items-center justify-content-center d-flex my-auto m-1">Kg</span>
                    </div>
            </div>
            <?php endfor; ?>
          
            <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Tambah</button>
        </form>
    </main>
    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>