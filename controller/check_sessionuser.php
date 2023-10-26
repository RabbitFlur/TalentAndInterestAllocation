<?php
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 3600)) {
    // Lebih dari 60 menit tidak ada aktivitas, hapus sesi dan arahkan ke halaman login
    session_unset();
    session_destroy();
    header("Location: ../user/home.php");
    exit();
}

// Update waktu terakhir aktivitas
$_SESSION['last_activity'] = time();
?>
