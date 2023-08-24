<?php include '../controller/tampildataadministrator.php'?>
<?php include '../template/header.php'; ?>
<title>Homepage Admin</title>
    <style>
        
    /* .search-input {
        margin-bottom: 10px;
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .search-input input[type="text"] {
        border: none;
        border-bottom: 2px solid black;
        background-color: transparent;
        color: white;
        padding: 5px;
        margin-right: 10px;
    }

    .search-input input[type="submit"] {
        border: none;
        background-color: black;
        color: white;
        padding: 5px 10px;
        cursor: pointer;
    } */
    </style>
</head>
<body>
    <a class="logout-link" href="../controller/logout_admin.php">
        <img class="logout-logo" src="../image/exit-sign-icon.png" alt="Logout">
    </a>
    <div class="homepageadmin">
        <div class="homepageadmin-background">
            <h1>Data Peserta</h1>
            
            <div class="container-data">
                <div class="search-input">
                    <!-- <form method="GET"> -->
                        <!-- <label for="nim">Cari berdasarkan NIM:</label> -->
                        <!-- <input type="text" id="nim" name="nim" placeholder="Tuliskan NIM"> 
                        <input type="submit" value="Cari"> -->
                    <!-- </form> -->
                    <form method="GET" class="mb-3 d-flex">
                    <div class="input-group me-2">
                        <input type="text" id="nim" name="nim" class="form-control border-bottom-0" placeholder="Tuliskan NIM" style="background-color: transparent; color: white;">
                    </div>
                    <button class="btn btn-dark border-bottom-0" type="submit">Cari</button>
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
                <?php include '../controller/paginationtable.php'?>
                </div>
               </div>
        </div>
    </div>
<script>

</script>
 
</body>

</html>
