<?php include 'header.php'; ?>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Setting Harga Laundry</h4>
        </div>
        <div class="card-body">
            <?php
            include '../koneksi.php';

            // Mengambil harga per kilo dari database
            $result = mysqli_query($conn, "SELECT * FROM harga LIMIT 1");
            $harga = mysqli_fetch_assoc($result);
            ?>
            <form method="post" action="update_harga.php">
                <div class="mb-3">
                    <label for="harga_per_kilo" class="form-label">Harga per Kilo (Rp)</label>
                    <input type="number" class="form-control" id="harga_per_kilo" name="harga_per_kilo"
                        value="<?php echo $harga['harga_per_kilo']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Harga</button>
            </form>
        </div>
    </div>
</div>