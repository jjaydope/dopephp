<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
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
    <?php
    include "header.php";
    ?>

    <?php 
    include "koneksi.php";
    $qry_get_transaksi=mysqli_query($conn,"select * from transaksi where id_transaksi = '".$_GET['id_transaksi']."'");
    $dt_transaksi=mysqli_fetch_array($qry_get_transaksi);
    ?>
    <h3>Ubah Data Transaksi</h3>
    <form action="proses_ubah_transaksi.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_transaksi" value= "<?=$dt_transaksi['id_transaksi']?>">
        Status :
			<select name="status" class="form-control">
            <option></option>
            <option value="baru">Baru</option>
            <option value="proses">Proses</option>
            <option value="selesai">Selesai</option>
            <option value="diambil">Diambil</option>
</select>
        dibayar :
			<select name="dibayar" class="form-control">
            <option></option>
            <option value="dibayar">Dibayar</option>
            <option value="belum_dibayar">Belum dibayar</option>
</select>
        
        
    <input type="submit" name="simpan" value="Ubah Paket" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>