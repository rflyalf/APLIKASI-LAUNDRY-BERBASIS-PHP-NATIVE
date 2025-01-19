<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_layanan = $_POST['nama_layanan'];
    $harga = $_POST['harga'];

    $query = "INSERT INTO harga_layanan (nama_layanan, harga) VALUES ('$nama_layanan', '$harga')";
    if (mysqli_query($conn, $query)) {
        header("Location: setting_price.php?status=success");
    } else {
        header("Location: setting_price.php?status=error");
    }
}
?> ### setting_price_edit.php

```php
<?php
include '../koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM harga_layanan WHERE id_harga='$id'");
$d = mysqli_fetch_array($data);
?>

<?php include 'header.php'; ?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Edit Harga Layanan</h4>
        </div>
        <div class="card-body">
            <form action="setting_price_proses_edit.php" method="POST">
                <input type="hidden" name="id_harga" value="<?php echo $d['id_harga']; ?>">
                <div class="mb-3">
                    <label for="nama_layanan" class="form-label">Nama Layanan</label>
                    <input type="text" class="form-control" id="nama_layanan" name="nama_layanan"
                        value="<?php echo $d['nama_layanan']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga (Rp)</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $d['harga']; ?>"
                        required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="setting_price.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>