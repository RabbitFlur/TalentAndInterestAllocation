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
    ORDER BY hasil_formulir.tanggal_waktu DESC";

$result = mysqli_query($conn, $query);

// Mengatur header untuk file CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="hasil_test_TIA.csv"');

// Buka file CSV untuk penulisan
$output = fopen('php://output', 'w');

// Menulis header kolom
$header = array('Tanggal', 'Pukul', 'Nama', 'NIM', 'Semester', 'Program Studi', 'Kabupaten/Kota', 'Nomor HP', 'Kecenderungan');
fputcsv($output, $header);

// Menulis data ke dalam file CSV
while ($row = mysqli_fetch_assoc($result)) {
    $formattedDate = date("d-m-Y", strtotime($row['tanggal_waktu']));
    $formattedTime = date("H:i:s", strtotime($row['tanggal_waktu']));
    $data = array(
        $formattedDate,
        $formattedTime,
        $row['nama'],
        "'" . $row['nim'],
        $row['semester'],
        $row['prodi'],
        $row['kabko'],
        "'" . $row['hp'], // Memastikan nim dan no hp dalam format teks
        $row['kecenderungan']
    );
    fputcsv($output, $data);
}

// Tutup file CSV
fclose($output);
?>
