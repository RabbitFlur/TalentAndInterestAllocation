<?php include '../controller/tampildataadministrator.php'?>
<?php include '../template/header.php'; ?>
<title>Homepage Admin</title>
    <style>

    </style>
</head>
<body>
    <div class="homepageadmin">
        <div class="homepageadmin-background">
            <h1>Data Peserta</h1>
            
            <div class="container-data">
                <div class="search-input">
                    <form method="GET">
                        <!-- <label for="nim">Cari berdasarkan NIM:</label> -->
                        <input type="text" id="nim" name="nim" placeholder="Tuliskan NIM"> 
                        <input type="submit" value="Cari">
                    </form>
                </div>
                
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
                    <?php
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                    // Logic untuk membatasi tampilan maksimal 3 angka halaman:
                    $start_page = max(1, $current_page - 1);
                    $end_page = min($start_page + 2, $total_pages);

                    // Tampilkan navigasi First Page dan Previous Page:
                    if ($current_page > 1) {
                        echo "<a href='?page=1'>&laquo; First</a>";
                        echo "<a href='?page=".($current_page - 1)."'>Previous</a>";
                    }

                    // Tampilkan tautan untuk halaman-halaman terbatas (maksimal 3 angka):
                    for ($i = $start_page; $i <= $end_page; $i++) {
                        echo "<a href='?page=".$i."' class='".($i == $current_page ? 'active' : '')."'>".$i."</a>";
                    }

                    // Tampilkan navigasi Next Page dan Last Page:
                    if ($current_page < $total_pages) {
                        echo "<a href='?page=".($current_page + 1)."'>Next</a>";
                        echo "<a href='?page=".$total_pages."'>Last &raquo;</a>";
                    }
                    ?>
                </div>    
                <!-- <a class="logout" href="../controller/logout_admin.php">Logout</a> -->
            </div>
        </div>
    </div>
</body>
<script>
</script>
</html>
