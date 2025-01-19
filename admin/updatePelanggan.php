<?php 
// menghubungkan koneksi
include '../koneksi.php';

// menangkap data yang dikirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];

// update data
mysqli_query($conn,"update pelanggan set namaPelanggan='$nama', hpPelanggan='$hp', alamatPelanggan='$alamat' where idPelanggan='$id'");

// mengalihkan halaman kembali ke halaman pelanggan
header("location:pelanggan.php");
?>