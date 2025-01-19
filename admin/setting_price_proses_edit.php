<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_harga = $_POST['id_harga'];
    $nama_layanan = $_POST['nama_layanan'];
    $harga = $_POST['harga'];

    $query = "UPDATE harga_layanan SET nama_layanan='$nama_layanan', harga='$harga' WHERE id_harga='$id_harga'";
    if (mysqli_query($conn, $query)) {
        header("Location: setting_price.php?status=success");
    } else {
        header("Location: setting_price.php?status=error");
    }
}
