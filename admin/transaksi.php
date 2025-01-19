<?php include 'header.php'; ?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Data Transaksi Laundry</h4>
        </div>
        <div class="card-body">
            <a href="transaksi_tambah.php" class="btn btn-primary btn-sm"><i class="bi bi-plus"></i> Transaksi Baru</a>
            <br><br>
            <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Berat (Kg)</th>
                        <th>Tgl. Selesai</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';
                    $data = mysqli_query($conn, "SELECT * FROM pelanggan, transaksi WHERE transaksi_pelanggan = idPelanggan ORDER BY transaksi_id DESC");
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
                            <td>
                                <a href="transaksi_invoice.php?id=<?php echo $d['transaksi_id']; ?>" target="_blank"
                                    class="btn btn-warning btn-sm">Invoice</a>
                                <a href="transaksi_edit.php?id=<?php echo $d['transaksi_id']; ?>"
                                    class="btn btn-info btn-sm">Edit</a>
                                <a href="transaksi_detail.php?id=<?php echo $d['transaksi_id']; ?>"
                                    class="btn btn-success btn-sm">Detail</a>
                                <a href="transaksi_hapus.php?id=<?php echo $d['transaksi_id']; ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin membatalkan transaksi ini?');">Batalkan</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>