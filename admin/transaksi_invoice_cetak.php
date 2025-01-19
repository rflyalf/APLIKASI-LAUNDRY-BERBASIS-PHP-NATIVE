<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Print</title>
    
</head>
<body>
<?php include 'header.php'; ?>
<!-- Cek apakah sudah login
<?php 
// session_start();
// if ($_SESSION['status'] != "login") {
//     header("location:../index.php?pesan=belum_login");
// }
?> -->

<?php include '../koneksi.php'; ?>

<div class="container mt-4">
    <div class="col-lg-10 offset-lg-1">
        <?php 
        // Menangkap id yang dikirim melalui URL
        $id = $_GET['id'];
        // Mengambil data pelanggan dari tabel transaksi dan pelanggan
        $transaksi = mysqli_query($conn, "SELECT * FROM transaksi, pelanggan WHERE transaksi_id='$id' AND transaksi_pelanggan=idPelanggan");
        while ($t = mysqli_fetch_array($transaksi)) { ?>
            <div class="text-center">
                <h2>LAUNDRY APPS</h2>
            </div>
            <h3>INVOICE-<?php echo $t['transaksi_id']; ?></h3>
            <br>
            <table class="table">
                <tr>
                    <th style="width: 20%;">Tgl. Laundry</th>
                    <td>:</td>
                    <td><?php echo $t['transaksi_tgl']; ?></td>
                </tr>
                <tr>
                    <th>Nama Pelanggan</th>
                    <td>:</td>
                    <td><?php echo $t['namaPelanggan']; ?></td>
                </tr>
                <tr>
                    <th>HP</th>
                    <td>:</td>
                    <td><?php echo $t['hpPelanggan']; ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td><?php echo $t['alamatPelanggan']; ?></td>
                </tr>
                <tr>
                    <th>Berat Cucian (Kg)</th>
                    <td>:</td>
                    <td><?php echo $t['transaksi_berat']; ?></td>
                </tr>
                <tr>
                    <th>Tgl. Selesai</th>
                    <td>:</td>
                    <td><?php echo $t['transaksi_tgl_selesai']; ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>:</td>
                    <td>
                        <?php 
                        if ($t['transaksi_status'] == "0") {
                            echo "<span class='badge bg-warning'>PROSES</span>";
                        } elseif ($t['transaksi_status'] == "1") {
                            echo "<span class='badge bg-info'>DI CUCI</span>";
                        } elseif ($t['transaksi_status'] == "2") {
                            echo "<span class='badge bg-success'>SELESAI</span>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>:</td>
                    <td><?php echo "Rp. " . number_format($t['transaksi_harga']) . " ,-"; ?></td>
                </tr>
            </table>
            <br>
            <h4>Daftar Cucian</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Jenis Pakaian</th>
                        <th style="width: 20%;">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $id = $t['transaksi_id'];
                    $pakaian = mysqli_query($conn, "SELECT * FROM pakaian WHERE pakaian_transaksi='$id'");
                    while ($p = mysqli_fetch_array($pakaian)) { ?>
                        <tr>
                            <td><?php echo $p['pakaian_jenis']; ?></td>
                            <td><?php echo $p['pakaian_jumlah']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br>
            <p class="text-center"><i>"Terima kasih telah mempercayakan cucian anda pada kami."</i></p>
        <?php } ?>
    </div>
</div>

<script type="text/javascript">
    window.print();
</script>
</body>
</html>
