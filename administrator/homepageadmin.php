<?php include '../controller/tampildataadministrator.php'?>
<?php include '../template/header.php'; ?>


<title>Homepage Admin</title>
</head>
<body>
    <a class="logoutadmin-link" href="../controller/logout_admin.php">
        <img class="logoutadmin-logo" src="../image/exit-sign-icon.png" alt="Logout">
    </a>
    <div class="homepageadmin">
        <div class="homepageadmin-background">
            <h1>Data Peserta</h1>
            <div class="container-data">
            <div class="search-container">
                <form method="GET">  
                    <span id="reset" onclick="resetTable()">
                        <img src="../image/reset.png" alt="Reset" width="20" height="20">
                    </span>                 
                    <input type="text" id="nim" name="nim" class="search-box" placeholder="Cari NIM..." value="<?php echo $nimFilter; ?>">
                    <span id="search" onclick="filterTableByNIM()">Cari</span>                    
                </form>
            </div>
            <a id="download-csv" href="download_csv.php?nim=<?php echo $nimFilter; ?>">Unduh CSV</a>
            <table class="tabel-data">
                <tr>
                    <th>Tanggal</th>
                    <th>Pukul</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Semester</th>
                    <th>Program Studi</th>
                    <th>Kabupaten/Kota</th>
                    <th>Nomor HP</th>
                    <th>Kecenderungan</th>
                    </tr>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr class='tdhover'>";
                            $formattedDate = date("d-m-Y", strtotime($row['tanggal_waktu']));
                            $formattedTime = date("H:i:s", strtotime($row['tanggal_waktu']));
                            echo "<td class='fixrow date'>" . $formattedDate . "</td>";
                            echo "<td class='time'>" . $formattedTime . "</td>";
                            echo "<td class='fixrow'>" . $row['nama'] . "</td>";
                            echo "<td>" . $row['nim'] . "</td>";
                            echo "<td>" . $row['semester'] . "</td>";
                            echo "<td>" . $row['prodi'] . "</td>";
                            echo "<td>" . $row['kabko'] . "</td>";
                            echo "<td>" . $row['hp'] . "</td>";
                            echo "<td>" . $row['kecenderungan'] . "</td>";
                            echo "</tr>";
                        }
                        } else {
                            echo "<tr><td colspan='9'>Tidak ada data.</td></tr>";
                        }
                    ?>
            </table>
            <div class="pagination">
                <?php include '../controller/paginationtable.php'?>
            </div>
            </div>
        </div>
    </div>
<script src="../modules/filterbynim.js" type="module"></script>
<script src="../modules/tabelreset.js" type="module"></script>
</body>
</html>
