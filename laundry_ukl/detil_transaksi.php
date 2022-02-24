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
<?php include('header.php'); ?>
    <main class="form-signin">
        <h1 class="h3 fw-normal text-center">Detil Transaksi</h1>
        <?php
            include ('koneksi.php');
            $qry_get=mysqli_query($conn,"select * from transaksi where id = '".$_GET['id']."'");
            $dt_get=mysqli_fetch_array($qry_get);
        ?>
        <form action="proses-ubah-transaksi.php" method="post">
            <div>
                <label for="member" class="form-label">Pelanggan</label>
                <input type="text" readonly class="form-control" name="member" id="member" value="<?php
                    $qry_member = mysqli_query($conn,"select * from member where id='$dt_get[id_member]'");
                    $data_member = mysqli_fetch_array($qry_member);
                    echo $data_member['nama'];
                ?>">
            </div>
            <div>
                <label for="tgl" class="form-label">Tanggal Pemesanan</label>
                <input type="text" readonly disabled class="form-control" id="tgl" name="tgl" value="<?=$dt_get['tgl']?>">
            </div>
            <div>
                <label for="batas_waktu" class="form-label">Batas Waktu</label>
                <input type="text" readonly disabled class="form-control" id="batas_waktu" name="batas_waktu" value="<?=$dt_get['batas_waktu']?>">
            </div>
            <div>
                <label for="tgl_bayar" class="form-label">Tanggal Bayar</label>
                <input type="text" readonly disabled class="form-control" id="tgl_bayar" name="tgl_bayar" value="<?=$dt_get['tgl_bayar']?>">
            </div>
            <div>
                <label for="dibayar" class="form-label">Status Pembayaran</label>
                <?php 
                    $arr_payment=array('dibayar'=>'Lunas','belum_dibayar'=>'Belum Lunas');
                ?>
                <select name="dibayar" id="dibayar" class="form-select">
                    <option disabled>Pilih Status Pengerjaan</option>
                        <?php foreach ($arr_payment as $key_payment => $val_payment):
                                if($key_payment==$dt_get['dibayar']){
                                $selek="selected";
                                } else {
                                $selek="";
                                }
                        ?>
                            <option value="<?=$key_payment?>" <?=$selek?>><?=$val_payment?></option>
                        <?php endforeach ?>
                </select>
            </div>
            <div>
                <label for="status" class="form-label">Status Pengerjaan</label>
                <?php 
                    $arr_status=array('baru'=>'Baru','proses'=>'Proses', 'selesai'=>'Selesai', 'diambil'=>'Diambil');
                ?>
                <select name="status" id="status" class="form-select">
                    <option disabled>Pilih Status Pengerjaan</option>
                        <?php foreach ($arr_status as $key_status => $val_status):
                            if($key_status==$dt_get['status']){
                                $selek="selected";
                            } else {
                                $selek="";
                            }
                        ?>
                            <option value="<?=$key_status?>" <?=$selek?>><?=$val_status?></option>
                        <?php endforeach ?>
                </select>
            </div>
            <?php
                // update data for multi transaction
                $qry_packg=mysqli_query($conn,"select * from detil_transaksi where id_transaksi='$dt_get[id]'");
                while ($dt_packg=mysqli_fetch_array($qry_packg)) {
                    $qry_pack=mysqli_query($conn,"select * from paket where id='$dt_packg[id_paket]'");
                    $data_pack=mysqli_fetch_array($qry_pack);
                        echo "<div>
                                    <label for='jenis' class='form-label'>Tipe Jasa</label>
                                    <select name='id_paket[]' id='id_paket[]' class='form-select'>
                                        <option disabled>Pilih Jenis Tipe Jasa</option>";
                                            $qry_pack=mysqli_query($conn,"select * from paket");
                                            while ($data_pack=mysqli_fetch_array($qry_pack)) {
                                              if($data_pack['id']==$dt_packg['id_paket']){
                                                echo "<option value='$data_pack[id]'selected>$data_pack[jenis]</option>";
                                              }
                                            }
                                            echo "</select>
                              </div>
                              <div>
                                    <label for='qty' class='form-label'>Kuantitas</label>
                                    <div class='d-flex'>
                                        <input type='text' readonly name='qty[]' id='qty[]' class='form-control' value='$dt_packg[qty]' />
                                        <span class='my-auto'>Kg</span>
                                    </div>
                              </div>";
                }
            ?>
          
            <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Ubah Data</button>
        </form>
        <button class="w-100 btn btn-lg btn-success mt-2" onclick="const printBtn = document.getElementById('print'); window.print();" id="print"><i class="bi bi-download"></i> Laporan</button>
    </main>
    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>