<?php
session_start();
include '../config/koneksi.php'; // Gantikan dengan skrip koneksi ke database Anda

// Cek apakah pengguna sudah login atau belum
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: home.php");
    exit();
}

$user_id = $_SESSION['id'];
$user_name = $_SESSION['nama'];

// Query untuk mengambil data pengguna
$query_pengguna = "SELECT * FROM pengguna WHERE id = $user_id";
$result_pengguna = mysqli_query($conn, $query_pengguna);
$row_pengguna = mysqli_fetch_assoc($result_pengguna);

// Query untuk mengambil data hasil formulir yang bernilai true
$query_hasil_formulir = "SELECT id, tanggal_waktu,
                         CONCAT_WS(', ', 
                             IF(linguistik = 1, 'Linguistik', NULL), 
                             IF(logis_matematis = 1, 'Logis Matematis', NULL), 
                             IF(kinestetik = 1, 'Kinestetik', NULL), 
                             IF(musikal = 1, 'Musikal', NULL), 
                             IF(interpersonal = 1, 'Interpersonal', NULL), 
                             IF(intrapersonal = 1, 'Intrapersonal', NULL)
                         ) AS kecenderungan
                         FROM hasil_formulir
                         WHERE id_pengguna = $user_id
                         AND (linguistik = 1 OR logis_matematis = 1 OR kinestetik = 1 
                              OR musikal = 1 OR interpersonal = 1 OR intrapersonal = 1)";
$result_hasil_formulir = mysqli_query($conn, $query_hasil_formulir);
?>

<?php include '../template/header.php'; ?>
<link rel="stylesheet" type="text/css" href="styles.css">
<title>Beranda</title>
</head>
<style>
th, td {
  border: 2px solid #3498db; /* Atur border untuk td dan th */
  padding: 8px;
  text-align: left;
}

th {
  background-color: #1b4965; /* Warna lebih gelap untuk header */
  color: #fff; /* Warna teks putih untuk header */
  padding: 8px;
  text-align: center;
}

td {
  padding: 8px;
  text-align: left;
}
</style>
<body>
    <div class="homepage">
        <div class="info-bubble">
            <div class="user-info">
                <h3 class="judul">Data Pengguna</h3>
                <p class="aligned-text"><span><strong>Nama </strong></span><?php echo $row_pengguna['nama']; ?></p>
                <p class="aligned-text"><span><strong>NIM </strong></span><?php echo $row_pengguna['nim']; ?></p>
                <p class="aligned-text"><span><strong>Program Studi </strong></span><?php echo $row_pengguna['prodi']; ?></p>
            </div>
        </div>
        <div class="info-bubble">
            <div class="history">
                <h3 class="judul">Riwayat</h3>
                <table>
                    <tr>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Kecenderungan</th>
                    </tr>
                    <?php while ($row_formulir = mysqli_fetch_assoc($result_hasil_formulir)) : ?>
                        <tr>
                            <td><?php echo date('d-m-Y', strtotime($row_formulir['tanggal_waktu'])); ?></td>
                            <td><?php echo date('H:i:s', strtotime($row_formulir['tanggal_waktu'])); ?></td>
                            <td><?php echo $row_formulir['kecenderungan']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
        <br>
        <button class="button-tes" onclick="window.location.href='question.php'">Mulai Tes</button>
        <div class="logout-container">
            <a class="logout-link" href="../controller/logout.php">Logout</a>
        </div>
        <!-- <div class="scroll-text-container">
            <h6 class="scroll-text">Selamat Datang, <?php echo $user_name; ?>!</h6>
        </div> -->
    </div>
</body>
</html>
