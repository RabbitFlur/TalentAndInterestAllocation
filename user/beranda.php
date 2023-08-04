<?php
session_start();

// Cek apakah pengguna sudah login atau belum
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: home.php");
    exit();
}
?>

<?php include '../template/header.php'; ?>
    <title>Halaman Beranda</title>
</head>
<body>
    <h2>Selamat datang di halaman beranda, <?php echo $_SESSION['nama']; ?>!</h2>
    <p>Anda telah berhasil login.</p>
    <a href="../controller/logout.php">Logout</a> <!-- Tambahkan file 'logout.php' untuk proses logout -->
<?php include '../template/footer.php'; ?>
