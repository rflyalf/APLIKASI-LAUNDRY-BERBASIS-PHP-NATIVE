<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>invoice</title>
   
</head>
<body>
    <!-- memasukkan header -->
    <?php include 'header.php'; ?>
    <!-- Cek apakah sudah login -->
    <!-- <?php 
    session_start();
    if ($_SESSION['status'] != "login") {
        header("location:../index.php?pesan=belum_login");
    }
    ?> -->
    
    <?php include '../koneksi.php'; ?>
    
    <div class="container mt-4">
        <div class="col-lg-10 offset-lg-1">
            <?php 
            $id = $_GET['id'];
            $transaksi = mysqli_query($conn, "SELECT * FROM transaksi, pelanggan WHERE transaksi_id='$id' AND transaksi_pelanggan=idPelanggan");
            while ($t = mysqli_fetch_array($transaksi)) {
            ?>
            <div class="text-center">
                <h2>LAUNDRY APPS</h2>
            </div>
            <a href="transaksi_invoice_cetak.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-primary float-end">
                <i class="bi bi-printer"></i> CETAK
            </a>
            <br><br>
            <table class="table">
                <tr>
                    <th scope="row" style="width: 20%;">No. Invoice</th>
                    <td>INVOICE-<?php echo $t['transaksi_id']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Tgl. Laundry</th>
                    <td><?php echo $t['transaksi_tgl']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Nama Pelanggan</th>
                    <td><?php echo $t['namaPelanggan']; ?></td>
                </tr>
                <tr>
                    <th scope="row">HP</th>
                    <td><?php echo $t['hpPelanggan']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Alamat</th>
                    <td><?php echo $t['alamatPelanggan']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Berat Cucian (Kg)</th>
                    <td><?php echo $t['transaksi_berat']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Tgl. Selesai</th>
                    <td><?php echo $t['transaksi_tgl_selesai']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Status</th>
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
                    <th scope="row">Harga</th>
                    <td><?php echo "Rp. " . number_format($t['transaksi_harga']) . " ,-"; ?></td>
                </tr>
            </table>

            <div class="mt-4">
                <h4 class="text-center">Daftar Cucian</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Jenis Pakaian</th>
                            <th scope="col" style="width: 20%;">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $id = $t['transaksi_id'];
                        $pakaian = mysqli_query($conn, "SELECT * FROM pakaian WHERE pakaian_transaksi='$id'");
                        while ($p = mysqli_fetch_array($pakaian)) {
                        ?>
                        <tr>
                            <td><?php echo $p['pakaian_jenis']; ?></td>
                            <td><?php echo $p['pakaian_jumlah']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <p class="text-center mt-4"><i>"Terima kasih telah mempercayakan cucian anda pada kami."</i></p>
            <?php } ?>
        </div>
    </div>
</body>
</html>
