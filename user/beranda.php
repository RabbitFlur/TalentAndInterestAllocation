<?php
session_start();

// Cek apakah pengguna sudah login atau belum
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: home.php");
    exit();
}

$user_id = $_SESSION['id'];
$user_name = $_SESSION['nama'];
?>

<?php include '../template/header.php'; ?>
<title>Beranda</title>
</head>
<body>
    <h2>Selamat datang di halaman beranda, <?php echo $user_name; ?>!</h2>
    <p>Anda telah berhasil login.</p>
    <button class="button" onclick="window.location.href='question.php'">Mulai</button>
    <a href="../controller/logout.php">Logout</a> <!-- Tambahkan file 'logout.php' untuk proses logout -->
<?php include '../template/footer.php'; ?>
