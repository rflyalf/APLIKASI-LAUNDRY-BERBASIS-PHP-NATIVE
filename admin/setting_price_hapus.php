<?php
include '../koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM harga_layanan WHERE id_harga='$id'";
if (mysqli_query($conn, $query)) {
    header("Location: setting_price.php?status=deleted");
} else {
    header("Location: setting_price.php?status=error");
}
