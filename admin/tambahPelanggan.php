<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5" style='border: radius 15px;'>
        <center>
            <h2>Tambah Data Pelanggan</h2>
        </center>
        <form action="prosesTambahPelanggan.php" method="POST">
            <div class="mb-3" ;>
                <label for="nama" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
            </div>
            <div class="mb-3">
                <label for="hp" class="form-label">No. Handphone</label>
                <input type="number" class="form-control" name="hp" id="hp" required>
            </div>
            <div class="mb-3" style='border: radius 15px;'>
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="pelanggan.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>

</html>