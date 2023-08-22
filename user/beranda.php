<?php include '../controller/tampildatapengguna.php'?>
<?php include '../template/header.php'; ?>
<link rel="stylesheet" type="text/css" href="styles.css">
<title>Beranda</title>
</head>
<style>
th, td {
  border: 2px solid #3498db; 
  padding: 8px;
  text-align: left;
}

th {
  background-color: #1b4965;
  color: #fff;
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
    <div class="homepage-background">
        <div class="info-bubble">
            <div class="user-info">
                <h3 class="judul">Data Pengguna</h3>
                <div class="info-table">
                    <div class="info-row">
                        <div class="info-cell info-cell-left"><strong>Nama</strong></div>
                        <div class="info-cell"><?php echo $row_pengguna['nama']; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-cell info-cell-left"><strong>NIM</strong></div>
                        <div class="info-cell"><?php echo $row_pengguna['nim']; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-cell info-cell-left"><strong>Program Studi</strong></div>
                        <div class="info-cell"><?php echo $row_pengguna['prodi']; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="info-bubble">
            <div class="history">
                <h3 class="judul">Riwayat</h3>
                <div class="table-container">
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
        </div>
        <button class="button-tes" onclick="window.location.href='question.php'">Mulai Tes</button>
        <div class="logout-container">
            <a class="logout-link" href="../controller/logout.php">Logout</a>
        </div>
    </div>
    </div>
</body>
</html>
