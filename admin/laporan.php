<?php
include 'header.php';

?>


<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Filter Laporan</h4>
        </div>
        <div class="card-body">
            <form action="laporan.php" method="get">
                <div class="row">
                    <div class="col-md-5">
                        <label for="tgl_dari" class="form-label">Dari Tanggal</label>
                        <input type="date" id="tgl_dari" name="tgl_dari" class="form-control">
                    </div>
                    <div class="col-md-5">
                        <label for="tgl_sampai" class="form-label">Sampai Tanggal</label>
                        <input type="date" id="tgl_sampai" name="tgl_sampai" class="form-control">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <br />

    <?php
    if (isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])) {
        $dari = $_GET['tgl_dari'];
        $sampai = $_GET['tgl_sampai'];
    ?>
        <div class="card">
            <div class="card-header">
                <h4>Data Laporan Laundry Apps dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
            </div>
            <div class="card-body">
                <a target="_blank" href="cetak_print.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>"
                    class="btn btn-primary btn-sm mb-3">
                    <i class="bi bi-printer"></i> CETAK
                </a>
                <table class="table table-bordered table-striped">
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
                        include '../koneksi.php';
                        $data = mysqli_query($conn, "SELECT * FROM pelanggan,transaksi WHERE transaksi_pelanggan=idPelanggan AND DATE(transaksi_tgl) >= '$dari' AND DATE(transaksi_tgl) <= '$sampai' ORDER BY transaksi_id DESC");
                        $no = 1;
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
            </div>
        </div>
    <?php } ?>
</div>