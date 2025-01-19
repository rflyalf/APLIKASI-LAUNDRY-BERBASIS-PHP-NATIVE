<?php include 'header.php'; ?>

<?php
// koneksi database
include '../koneksi.php';

// menangkap ID transaksi dari URL
$id = $_GET['id'];

// mengambil detail transaksi dari database
$transaksi = mysqli_query($conn, "SELECT * FROM transaksi 
    JOIN pelanggan ON transaksi.transaksi_pelanggan = pelanggan.idPelanggan 
    WHERE transaksi_id='$id'");
$d = mysqli_fetch_array($transaksi);

// mengambil data jenis pakaian terkait transaksi
$pakaian = mysqli_query($conn, "SELECT * FROM pakaian WHERE pakaian_transaksi='$id'");
?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Detail Transaksi</h4>
        </div>
        <div class="card-body">
            <h5>Informasi Transaksi</h5>
            <p>Invoice: <strong>INVOICE-<?php echo $d['transaksi_id']; ?></strong></p>
            <p>Pelanggan: <strong><?php echo $d['namaPelanggan']; ?></strong></p>
            <p>Tanggal: <strong><?php echo $d['transaksi_tgl']; ?></strong></p>
            <p>Berat: <strong><?php echo $d['transaksi_berat']; ?> Kg</strong></p>
            <p>Status: <strong>
                    <?php
                    if ($d['transaksi_status'] == "0") {
                        echo "Proses";
                    } elseif ($d['transaksi_status'] == "1") {
                        echo "Dicuci";
                    } elseif ($d['transaksi_status'] == "2") {
                        echo "Selesai";
                    }
                    ?>
                </strong></p>

            <h5>Jenis Pakaian</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Pakaian</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($jp = mysqli_fetch_array($pakaian)) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $jp['nama_jenis']; ?></td>
                        <td><?php echo $jp['jumlah']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <a href="transaksi.php" class="btn btn-primary btn-sm">Kembali</a>
        </div>
    </div>
</div>