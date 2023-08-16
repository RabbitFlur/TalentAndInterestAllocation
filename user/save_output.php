<?php
// Koneksi ke database (sesuaikan dengan konfigurasi database Anda)
// $servername = "localhost";
// $username = "username";
// $password = "password";
// $dbname = "nama_database";

// $conn = new mysqli($servername, $username, $password, $dbname);
include '../config/koneksi.php';

// Cek koneksi
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// Terima data dari halaman pertanyaan
$inputData = json_decode(file_get_contents('php://input'), true);
$outputs = $inputData['outputs'];

// Simpan data ke dalam database
$sql = "INSERT INTO hasil_formulir (linguistik, logis_matematis, kinestetik, musikal, interpersonal, intrapersonal)
        VALUES ('{$outputs[0]}', '{$outputs[1]}', '{$outputs[2]}', '{$outputs[3]}', '{$outputs[4]}', '{$outputs[5]}')";

if ($conn->query($sql) === TRUE) {
    $response = array('success' => true);
} else {
    $response = array('success' => false, 'error' => $conn->error);
}

$conn->close();

// Mengirim respon kembali ke halaman pertanyaan
header('Content-Type: application/json');
echo json_encode($response);
?>
