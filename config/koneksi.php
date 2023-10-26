<?php
// Konfigurasi koneksi ke database
$host = "localhost"; // Ganti dengan nama host database Anda
$username = "u463963551_root"; // Ganti dengan nama pengguna database Anda
$password = "#Baru2022"; // Ganti dengan kata sandi database Anda
$database = "u463963551_dbtia"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Jika ingin menggunakan encoding UTF-8, tambahkan kode berikut
mysqli_set_charset($conn, "utf8");
?>
