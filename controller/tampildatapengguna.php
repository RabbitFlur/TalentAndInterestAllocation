<?php
session_start();
include '../config/koneksi.php'; // Gantikan dengan skrip koneksi ke database Anda

// Cek apakah pengguna sudah login atau belum
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: home.php");
    exit();
}

include 'check_sessionuser.php';

$user_id = $_SESSION['id'];
$user_name = $_SESSION['nama'];

// Query untuk mengambil data pengguna
$query_pengguna = "SELECT * FROM pengguna WHERE id = $user_id";
$result_pengguna = mysqli_query($conn, $query_pengguna);
$row_pengguna = mysqli_fetch_assoc($result_pengguna);

// Query untuk mengambil data hasil formulir yang bernilai true
$query_hasil_formulir = "SELECT id, tanggal_waktu,
                         CONCAT_WS(', ', 
                             IF(linguistik = 1, 'Linguistik', NULL), 
                             IF(logis_matematis = 1, 'Logis Matematis', NULL), 
                             IF(kinestetik = 1, 'Kinestetik', NULL), 
                             IF(musikal = 1, 'Musikal', NULL), 
                             IF(interpersonal = 1, 'Interpersonal', NULL), 
                             IF(intrapersonal = 1, 'Intrapersonal', NULL)
                         ) AS kecenderungan
                         FROM hasil_formulir
                         WHERE id_pengguna = $user_id
                         AND (linguistik = 1 OR logis_matematis = 1 OR kinestetik = 1 
                              OR musikal = 1 OR interpersonal = 1 OR intrapersonal = 1)
                              ORDER BY tanggal_waktu DESC";
$result_hasil_formulir = mysqli_query($conn, $query_hasil_formulir);
?>
