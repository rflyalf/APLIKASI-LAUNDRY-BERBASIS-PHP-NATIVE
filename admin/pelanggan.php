<?php include 'header.php'; ?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Data Pelanggan</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <input type="text" id="search" class="form-control" placeholder="Cari nama pelanggan..."
                    onkeyup="searchPelanggan()">
            </div>
            <a href="tambahPelanggan.php" class="btn btn-primary btn-sm">Tambah Data</a>
            <br><br>
            <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No. Handphone</th>
                        <th>Alamat</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody id="pelangganTableBody">
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY namaPelanggan ASC");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['namaPelanggan']; ?></td>
                        <td><?php echo $data['hpPelanggan']; ?></td>
                        <td><?php echo $data['alamatPelanggan']; ?></td>
                        <td>
                            <a href="editPelanggan.php?id=<?php echo $data['idPelanggan']; ?>"
                                class="btn btn-info btn-sm">Edit</a>
                            <a href="detailPelanggan.php?id=<?php echo $data['idPelanggan']; ?>"
                                class="btn btn-success btn-sm">Detail</a>
                            <a href="hapusPelanggan.php?id=<?php echo $data['idPelanggan']; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function searchPelanggan() {
    const input = document.getElementById('search');
    const filter = input.value.toLowerCase();
    const table = document.getElementById('pelangganTableBody');
    const rows = table.getElementsByTagName('tr');

    for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');
        let found = false;

        for (let j = 1; j < cells.length - 1; j++) { // Start from 1 to skip "No" column and end before "Aksi" column
            if (cells[j].textContent.toLowerCase().indexOf(filter) > -1) {
                found = true;
                break;
            }
        }

        if (found) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }
}
</script>