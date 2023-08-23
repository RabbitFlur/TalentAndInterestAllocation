<?php
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 900)) {
    // Lebih dari 15 menit tidak ada aktivitas, hapus sesi dan arahkan ke halaman login
    session_unset();
    session_destroy();
    header("Location: ../admin/administrator.php");
    exit();
}

// Update waktu terakhir aktivitas
$_SESSION['last_activity'] = time();
?>
