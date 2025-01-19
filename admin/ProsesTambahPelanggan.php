<?php
// Menghubungkan koneksi
include '../koneksi.php';

// Menangkap data dari form
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];

// Query tambah data
$query = "INSERT INTO pelanggan (namaPelanggan, hpPelanggan, alamatPelanggan) 
          VALUES ('$nama', '$hp', '$alamat')";

if (mysqli_query($conn, $query)) {
    // Redirect ke halaman pelanggan
    header("Location: pelanggan.php?");
}
