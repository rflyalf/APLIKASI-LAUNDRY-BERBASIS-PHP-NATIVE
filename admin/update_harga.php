<?php
include '../koneksi.php';

// Menangkap data harga yang dikirim dari form
$harga_per_kilo = $_POST['harga_per_kilo'];

// Update harga di database
$query = "UPDATE harga SET harga_per_kilo='$harga_per_kilo'";
mysqli_query($conn, $query);

// Redirect kembali ke halaman setting harga
header("Location: setting_price.php");
