<?php
//koneksi ke db

$conn = new mysqli('localhost', 'root', '', 'dblaundry');

if ($conn->connect_error) die('koneksi gagal:' . $conn->connect_error);
