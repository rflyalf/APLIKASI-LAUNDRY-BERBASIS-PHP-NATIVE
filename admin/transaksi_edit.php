<?php include 'header.php'; ?>
<?php include '../koneksi.php';?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Transaksi Laundry</h4>
        </div>
        <div class="card-body">
            <a href="transaksi.php" class="btn btn-info btn-sm float-end">Kembali</a>
            <div class="clearfix mb-4"></div>
            <?php 
            // menangkap id yang dikirim melalui url
            $id = $_GET['id'];

            // mengambil data pelanggan yang ber id di atas dari tabel pelanggan
            $transaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE transaksi_id='$id'");
            while ($t = mysqli_fetch_array($transaksi)) { ?>
                <form method="post" action="transaksi_update.php">
                    <!-- menyimpan id transaksi yang di edit dalam form hidden berikut -->
                    <input type="hidden" name="id" value="<?php echo $t['transaksi_id']; ?>">

                    <div class="mb-3">
                        <label for="pelanggan" class="form-label">Pelanggan</label>
                        <select class="form-select" name="pelanggan" id="pelanggan" required>
                            <option value="">- Pilih Pelanggan</option>
                            <?php 
                            // mengambil data pelanggan dari database
                            $data = mysqli_query($conn, "SELECT * FROM pelanggan");
                            // menampilkan data dengan perulangan
                            while ($d = mysqli_fetch_array($data)) { ?>
                                <option <?php if ($d['idPelanggan'] == $t['transaksi_pelanggan']) { echo "selected"; } ?> value="<?php echo $d['idPelanggan']; ?>">
                                    <?php echo $d['namaPelanggan']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="berat" class="form-label">Berat</label>
                        <input type="number" class="form-control" id="berat" name="berat" placeholder="Masukkan berat cucian ..." required value="<?php echo $t['transaksi_berat']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="tgl_selesai" class="form-label">Tgl. Selesai</label>
                        <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" required value="<?php echo $t['transaksi_tgl_selesai']; ?>">
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Jenis Pakaian</th>
                                    <th width="20%">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // menyimpan id transaksi ke variabel id_transaksi
                                $id_transaksi = $t['transaksi_id'];
                                // menampilkan pakaian dari transaksi berdasarkan id
                                $pakaian = mysqli_query($conn, "SELECT * FROM pakaian WHERE pakaian_transaksi='$id_transaksi'");
                                while ($p = mysqli_fetch_array($pakaian)) { ?>
                                    <tr>
                                        <td><input type="text" class="form-control" name="jenis_pakaian[]" value="<?php echo $p['pakaian_jenis']; ?>"></td>
                                        <td><input type="number" class="form-control" name="jumlah_pakaian[]" value="<?php echo $p['pakaian_jumlah']; ?>"></td>
                                    </tr>
                                <?php } ?>
                                <!-- Tambahkan input kosong untuk jenis pakaian baru -->
                                <?php for ($i = 0; $i < 4; $i++) { ?>
                                    <tr>
                                        <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                                        <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status" required>
                            <option <?php if ($t['transaksi_status'] == "0") { echo "selected"; } ?> value="0">PROSES</option>
                            <option <?php if ($t['transaksi_status'] == "1") { echo "selected"; } ?> value="1">DI CUCI</option>
                            <option <?php if ($t['transaksi_status'] == "2") { echo "selected"; } ?> value="2">SELESAI</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            <?php } ?>
        </div>
    </div>
</div>

