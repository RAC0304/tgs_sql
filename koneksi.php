<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "fim_database";

//membuat koneksi
$conn = mysqli_connect($host, $user, $password, $database);

//memeriksa koneksi
if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

echo "koneksi berhasil";

mysqli_close($conn);
