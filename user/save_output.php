<?php
include '../config/koneksi.php';
// Mulai sesi jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Periksa apakah pengguna memiliki sesi aktif
if (isset($_SESSION['id'])) {
    // Ambil data kunci tamu dari pengguna yang sedang aktif
    $user_id = $_SESSION['id'];

    // Terima data dari halaman pertanyaan
    $inputData = json_decode(file_get_contents('php://input'), true);
    $outputs = $inputData['outputs'];

    // Simpan data ke dalam database
    $sql = "INSERT INTO hasil_formulir (id_pengguna, linguistik, logis_matematis, kinestetik, musikal, interpersonal, intrapersonal)
            VALUES ('$user_id', '{$outputs[0]}', '{$outputs[1]}', '{$outputs[2]}', '{$outputs[3]}', '{$outputs[4]}', '{$outputs[5]}')";

    if ($conn->query($sql) === TRUE) {
        $response = array('success' => true);
    } else {
        $response = array('success' => false, 'error' => $conn->error);
    }
} else {
    $response = array('success' => false, 'error' => 'Sesi tidak valid');
}

$conn->close();

// Mengirim respon kembali ke halaman pertanyaan
header('Content-Type: application/json');
echo json_encode($response);
?>
