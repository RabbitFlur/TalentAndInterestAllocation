<?php
session_start();

// Jika pengguna belum login, arahkan ke halaman login
if (!isset($_SESSION['id'])) {
    header("Location: ../administrator/home.php");
    exit();
}

// Hapus semua data sesi
session_destroy();

// Alihkan pengguna kembali ke halaman administrator
header("Location: ../administrator/home.php");
exit();
?>
