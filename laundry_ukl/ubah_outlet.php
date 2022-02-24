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
     include "header.php"
     ?>

    <?php 
    include "koneksi.php";
    $qry_get_outlet=mysqli_query($conn,"select * from outlet where id_outlet = '".$_GET['id_outlet']."'");
    $dt_outlet=mysqli_fetch_array($qry_get_outlet);
    ?>
    <h3>Ubah Data Outlet</h3>
    <form action="proses_ubah_outlet.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_outlet" value= "<?=$dt_outlet['id_outlet']?>">
        Alamat Outlet:
        <input type="text" name="alamat" value="<?=$dt_outlet['alamat']?>" class="form-control">
        No Telp: 
        <input type="text" name="telp" value="<?=$dt_outlet['telp']?>" class="form-control">
        
        
    <input type="submit" name="simpan" value="Ubah Outlet" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>