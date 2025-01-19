<?php include 'header.php'; ?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Harga Layanan</h4>
        </div>
        <div class="card-body">
            <form action="setting_price_proses_tambah.php" method="POST">
                <div class="mb-3">
                    <label for="nama_layanan" class="form-label">Nama Layanan</label>
                    <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga (Rp)</label>
                    <input type="number" class="form-control" id="harga" name="harga" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="setting_price.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>