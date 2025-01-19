<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak laporan</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery.js"></script>
</head>

<body>
    <!-- Cek apakah sudah login -->
    <?php
    session_start();
    if ($_SESSION['status'] != "login") {
        header("location:../index.php?pesan=belum_login");
    }
    ?>

    <?php include '../koneksi.php'; ?>

    <div class="container mt-4">
        <div>
            <h2>LAUNDRY APPS</h2>
        </div>

        <?php
        if (isset($_GET['dari']) && isset($_GET['sampai'])) {
            $dari = $_GET['dari'];
            $sampai = $_GET['sampai'];
        ?>
            <h4>Data Laporan Laundry dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
            <table class="table table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Berat (Kg)</th>
                        <th>Tgl. Selesai</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Mengambil data pelanggan dari database
                    $data = mysqli_query($conn, "SELECT * FROM pelanggan, transaksi WHERE transaksi_pelanggan = idPelanggan AND DATE(transaksi_tgl) >= '$dari' AND DATE(transaksi_tgl) <= '$sampai' ORDER BY transaksi_id DESC");
                    $no = 1;
                    // Mengubah data ke array dan menampilkannya dengan perulangan while
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>INVOICE-<?php echo $d['transaksi_id']; ?></td>
                            <td><?php echo $d['transaksi_tgl']; ?></td>
                            <td><?php echo $d['namaPelanggan']; ?></td>
                            <td><?php echo $d['transaksi_berat']; ?></td>
                            <td><?php echo $d['transaksi_tgl_selesai']; ?></td>
                            <td><?php echo "Rp. " . number_format($d['transaksi_harga']) . " ,-"; ?></td>
                            <td>
                                <?php
                                if ($d['transaksi_status'] == "0") {
                                    echo "<span class='badge bg-warning text-dark'>PROSES</span>";
                                } elseif ($d['transaksi_status'] == "1") {
                                    echo "<span class='badge bg-info text-dark'>DICUCI</span>";
                                } elseif ($d['transaksi_status'] == "2") {
                                    echo "<span class='badge bg-success'>SELESAI</span>";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>

    <script>
        // Cetak otomatis
        window.print();
    </script>
</body>

</html>