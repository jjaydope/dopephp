






<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title></title>
    </head>
<body>
<?php
include "header.php";
?>

<html lang="en">
<head>
  <title>Laundry</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

    <h3>Transaksi</h3>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th><th>ID Member</th><th>Tanggal</th><th>Batas Waktu</th><th>TGL Bayar</th><th>Status</th><th>di bayar</th><th>id user</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include "koneksi.php";
            $qry_transaksi=mysqli_query($conn,"select * from transaksi");
            $no = 0;
            while($data_transaksi=mysqli_fetch_array($qry_transaksi)){
            $no++;?>
            <tr>
                <td><?=$no?></td>
                <td>
                    <?php
                        include "koneksi.php";
                        $qry_get_member=mysqli_query($conn, "select * from member where id_member='".$data_transaksi['id_member']."'");
                        $data_member = mysqli_fetch_array($qry_get_member   );
                        echo $data_member['nama']; 
                    ?>
                    <!-- <?=$data_transaksi['id_member']?> -->
                </td> 
                <td><?=$data_transaksi['tgl']?></td>
                <td><?=$data_transaksi['batas_waktu']?></td> 
                <td><?=$data_transaksi['tgl_bayar']?></td>
                <td><?=$data_transaksi['status']?></td> 
                <td><?=$data_transaksi['dibayar']?></td>
                <td><?=$data_transaksi['id_user']?></td>

                <td><a href = "ubah_transaksi.php?id_transaksi=<?=$data_transaksi['id_transaksi']?>" 
                class = "btn btn-success">Ubah</a>  
                <a href = "hapus_transaksi.php?id_transaksi=<?=$data_transaksi['id_transaksi']?>" 
                onclick = "return confirm('Apakah anda yakin menghapus data ini?')" 
                class = "btn btn-danger">Hapus</a></td> 
            



            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>