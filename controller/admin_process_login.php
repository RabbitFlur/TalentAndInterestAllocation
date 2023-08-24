<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data koneksi dari berkas eksternal
    include '../config/koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Gunakan prepared statement untuk menghindari SQL Injection
    $stmt = $conn->prepare("SELECT id, username, password FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifikasi kata sandi
        if ($password === $row['password']) {
            // Jika kata sandi cocok, buat sesi
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            // Hapus prepared statement dan tutup koneksi
            $stmt->close();
            $conn->close();
            
            // Alihkan ke halaman admin setelah login sukses
            header("Location: ../administrator/homepageadmin.php");
            exit();
        }
    }

    // Tunggu sebentar untuk mengurangi risiko serangan brute force
    sleep(2);

    // Jika login gagal, arahkan kembali ke halaman login
    $stmt->close();
    $conn->close();
    header("Location: ../administrator/home.php");
    exit();
} else {
    // Jika halaman ini diakses secara langsung, arahkan kembali ke halaman login
    header("Location: home.php");
    exit();
}
?>
