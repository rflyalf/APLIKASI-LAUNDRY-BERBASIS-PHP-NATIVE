<?php include 'header.php'; ?>

<?php 
// koneksi database
include '../koneksi.php';
?>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Transaksi Laundry Baru</h4>
        </div>
        <div class="card-body">

            <div class="col-md-8 mx-auto">
                <a href="transaksi.php" class="btn btn-sm btn-info float-end">Kembali</a>
                <br/>
                <br/>
                <form method="post" action="transaksi_aksi.php">
                    <div class="mb-3">
                        <label for="pelanggan" class="form-label">Pelanggan</label>
                        <select class="form-select" id="pelanggan" name="pelanggan" required>
                            <option value="">- Pilih Pelanggan</option>
                            <?php 
                            // mengambil data pelanggan dari database
                            $data = mysqli_query($conn, "SELECT * FROM pelanggan");
                            // mengubah data ke array dan menampilkannya dengan perulangan while
                            while($d = mysqli_fetch_array($data)){
                            ?>
                                <option value="<?php echo $d['idPelanggan']; ?>"><?php echo $d['namaPelanggan']; ?></option>
                            <?php 
                            }
                            ?>		
                        </select>
                    </div>	

                    <div class="mb-3">
                        <label for="berat" class="form-label">Berat</label>
                        <input type="number" class="form-control" id="berat" name="berat" placeholder="Masukkan berat cucian .." required>
                    </div>	

                    <div class="mb-3">
                        <label for="tgl_selesai" class="form-label">Tgl. Selesai</label>
                        <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" required>
                    </div>	

                    <br/>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Jenis Pakaian</th>
                                <th style="width:20%;">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < 10; $i++) { ?>
                                <tr>
                                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <input type="submit" class="btn btn-primary" value="Simpan">	
                </form>

            </div>
            
        </div>
    </div>
</div>


