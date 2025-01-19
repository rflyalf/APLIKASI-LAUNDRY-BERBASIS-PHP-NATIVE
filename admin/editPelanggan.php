<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Edit Data Pelanggan</h4>
        </div>
        <div class="card-body">
            <?php
            $id = $_GET['id'];
            $data = mysqli_query($conn, "SELECT * FROM pelanggan WHERE idPelanggan='$id'");
            while ($d = mysqli_fetch_array($data)) {
            ?>
            <form method="post" action="updatePelanggan.php">
                <input type="hidden" name="id" value="<?php echo $d['idPelanggan']; ?>">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama .."
                        value="<?php echo $d['namaPelanggan']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="hp" class="form-label">HP</label>
                    <input type="number" class="form-control" id="hp" name="hp" placeholder="Masukkan no.hp .."
                        value="<?php echo $d['hpPelanggan']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3"
                        required><?php echo $d['alamatPelanggan']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="pelanggan.php" class="btn btn-secondary">Batal</a>
            </form>
            <?php 
            }
            ?>
        </div>
    </div>
</div>