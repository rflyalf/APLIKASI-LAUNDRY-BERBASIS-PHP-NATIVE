<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Contoh menggunakan MD5, gunakan hashing yang lebih aman seperti bcrypt di production.

    $query = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
    $query->bind_param('ss', $username, $password);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("Location: admin/index.php");
    } else {
        header("location:index.php?pesan=gagal");
    }
}
