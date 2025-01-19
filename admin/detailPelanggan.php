<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Detail Pelanggan</h4>
        </div>
        <div class="card-body">
            <?php
            // Menangkap ID pelanggan dari URL
            $id = $_GET['id'];
            $data = mysqli_query($conn, "SELECT * FROM pelanggan WHERE idPelanggan='$id'");
            $d = mysqli_fetch_array($data);
            ?>
            <p><strong>Nama:</strong> <?php echo $d['namaPelanggan']; ?></p>
            <p><strong>No. Handphone:</strong> <?php echo $d['hpPelanggan']; ?></p>
            <p><strong>Alamat:</strong> <?php echo $d['alamatPelanggan']; ?></p>
            <a href="pelanggan.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>