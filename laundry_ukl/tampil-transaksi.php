<?php
include "header.php";
if ($_SESSION['role']=="owner") {
    echo "<script>location.href='home.php';</script>";
}
?>
<body class="bg-secondary">
    <div>
        <h3 align=center>Tampil Transaksi</h3>
        <table class="table table-hover table-dark table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>USER</th>
                    <th>MEMBER</th>
                    <th>TANGGAL</th>
                    <th>BATAS WAKTU</th>
                    <th>TANGGAL BAYAR</th>
                    <th>STATUS</th>
                    <th>JENIS PAKET</th>
                    <th>TOTAL</th>
                    <th>HARGA</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $qry_transaksi=mysqli_query($conn,"SELECT t.id_transaksi as t_id, m.nama as nama_member, t.tgl, t.batas_waktu, t.tgl_bayar, t.status, t.dibayar, u.nama as nama_kasir FROM transaksi t, member m, user u WHERE t.id_member = m.id_member AND t.id_user = u.id_user");
                // echo "SELECT t.id_transaksi as t_id, m.nama as nama_member, t.tgl, t.batas_waktu, t.tgl_bayar, t.status, t.dibayar, u.nama as nama_kasir FROM transaksi t, member m, user u WHERE t.id_member = m.id_member AND t.id_user = u.id_user";
                $no=0;
                while($data_transaksi=mysqli_fetch_array($qry_transaksi)){
                    $qry_dtl_transaksi = mysqli_query($conn, "SELECT *, qty * harga as total FROM detail_transaksi, paket WHERE id_transaksi = ".$data_transaksi['t_id']." AND paket.id_paket = detail_transaksi.id_paket");
                //    echo "SELECT *, qty * harga as total FROM detail_transaksi, paket WHERE id_transaksi = ".$data_transaksi['t_id']." AND paket.id_paket = detil_transaksi.id_paket";
                    $no++;
                    
                    $i = 0;
                    while ($data_dtl_transaksi = mysqli_fetch_assoc($qry_dtl_transaksi)) {
                        $i++;
                        if ($i == 1) {
                        ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$data_transaksi['nama_kasir']?></td>
                                <td><?=$data_transaksi['nama_member']?></td>
                                <td><?=$data_transaksi['tgl']?></td>
                                <td><?=$data_transaksi['batas_waktu']?></td>
                                <td><?=$data_transaksi['tgl_bayar']?></td>
                                <td><?=$data_transaksi['status']?></td>
                                <td><?=$data_dtl_transaksi['jenis']?></td>
                                <td><?=$data_dtl_transaksi['qty']?></td>
                                <td><?=$data_dtl_transaksi['harga']?></td>
                                <td><a
                                href="ubah_transaksi.php?id=<?=$data_transaksi['t_id']?>" class="btn btn-success">Ubah</a> | <a
                                href="hapus-transaksi.php?id=<?=$data_transaksi['t_id']?>"
                                onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr> 
                        <?php
                        } else {
                        ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><?=$data_dtl_transaksi['jenis']?></td>
                                <td><?=$data_dtl_transaksi['qty']?></td>
                                <td><?=$data_dtl_transaksi['total']?></td>
                                
                                <td></td>
                            </tr> 
                        <?php
                        }
                        
                    }
                    ?>
                    <?php
                }
                ?>
            </tbody>
            </table>
            <a href="tambah-transaksi.php?total_paket=1" class="btn btn-success">Tambah</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>