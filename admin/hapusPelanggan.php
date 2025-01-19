
<?php 
// menghubungkan koneksi
include '../koneksi.php';

// menangkap data id yang dikirim dari url
$id = $_GET['id'];

// menghapus pelanggan
mysqli_query($conn,"delete from pelanggan where idPelanggan='$id'");

// alihkan halaman ke halaman pelanggan
header("location:pelanggan.php");
?>