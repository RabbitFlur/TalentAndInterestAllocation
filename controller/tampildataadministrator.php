<?php
session_start();

// Jika pengguna belum login, arahkan ke halaman login
if (!isset($_SESSION['id'])) {
    header("Location: home.php");
    exit();
}

include '../controller/check_session.php';

// Menghubungkan ke database
include '../config/koneksi.php';

// Pengecekan jika parameter NIM dikirimkan
$nimFilter = isset($_GET['nim']) ? $_GET['nim'] : '';

$results_per_page = 2; // Jumlah hasil per halaman

$query = "SELECT COUNT(*) AS total FROM hasil_formulir";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total_results = $row['total'];

$total_pages = ceil($total_results / $results_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$start_index = ($page - 1) * $results_per_page;

$query = "SELECT pengguna.nama, pengguna.nim, pengguna.semester, pengguna.prodi, pengguna.kabko, pengguna.hp, hasil_formulir.tanggal_waktu,
    CONCAT_WS(', ', 
    IF(hasil_formulir.linguistik = 1, 'Linguistik', NULL), 
    IF(hasil_formulir.logis_matematis = 1, 'Logis Matematis', NULL), 
    IF(hasil_formulir.kinestetik = 1, 'Kinestetik', NULL), 
    IF(hasil_formulir.musikal = 1, 'Musikal', NULL), 
    IF(hasil_formulir.interpersonal = 1, 'Interpersonal', NULL), 
    IF(hasil_formulir.intrapersonal = 1, 'Intrapersonal', NULL)
    ) AS kecenderungan
    FROM pengguna JOIN hasil_formulir
    ON pengguna.id = hasil_formulir.id_pengguna 
    WHERE (linguistik = 1 OR logis_matematis = 1 OR kinestetik = 1 
    OR musikal = 1 OR interpersonal = 1 OR intrapersonal = 1)
    AND pengguna.nim LIKE '%$nimFilter%'
    ORDER BY hasil_formulir.tanggal_waktu DESC
    LIMIT $start_index, $results_per_page";

$result = mysqli_query($conn, $query);
?>