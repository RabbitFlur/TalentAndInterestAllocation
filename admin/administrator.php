<!DOCTYPE html>
<html>
<head>
    <title>Halaman Administrator</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .pagination a {
            padding: 8px 16px;
            text-decoration: none;
            background-color: #f2f2f2;
            border: 1px solid black;
            margin: 0 5px;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Data Pengguna dengan Kecenderungan</h1>
    
    <form method="GET">
        <label for="nim">Cari berdasarkan NIM:</label>
        <input type="text" id="nim" name="nim" placeholder="Tuliskan NIM">
        <input type="submit" value="Cari">
    </form>
    
    <table>
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
        // Menghubungkan ke database
        include '../config/koneksi.php';
        
        // Pengecekan jika parameter NIM dikirimkan
        $nimFilter = isset($_GET['nim']) ? $_GET['nim'] : '';

        $results_per_page = 6; // Jumlah hasil per halaman

        $query = "SELECT COUNT(*) AS total FROM hasil_formulir";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $total_results = $row['total'];

        $total_pages = ceil($total_results / $results_per_page);

        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        $start_index = ($page - 1) * $results_per_page;

        $query = "SELECT pengguna.nama, pengguna.nim, pengguna.semester, pengguna.prodi, pengguna.kabko, pengguna.hp, hasil_formulir.tanggal_waktu,
            CONCAT_WS(', ', 
            IF(hasil_formulir.linguistik = 1, 'Linguistik', NULL), 
            IF(hasil_formulir.logis_matematis = 1, 'Logis Matematis', NULL), 
            IF(hasil_formulir.kinestetik = 1, 'Kinestetik', NULL), 
            IF(hasil_formulir.musikal = 1, 'Musikal', NULL), 
            IF(hasil_formulir.interpersonal = 1, 'Interpersonal', NULL), 
            IF(hasil_formulir.intrapersonal = 1, 'Intrapersonal', NULL)
            ) AS kecenderungan
            FROM pengguna JOIN hasil_formulir
            ON pengguna.id = hasil_formulir.id_pengguna 
            WHERE (linguistik = 1 OR logis_matematis = 1 OR kinestetik = 1 
            OR musikal = 1 OR interpersonal = 1 OR intrapersonal = 1)
            AND pengguna.nim LIKE '%$nimFilter%'
            ORDER BY hasil_formulir.tanggal_waktu DESC
            LIMIT $start_index, $results_per_page";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                // Format tanggal
                $formattedDate = date("d-m-Y", strtotime($row['tanggal_waktu']));
                echo "<td>".$formattedDate."</td>";
                // Menampilkan jam
                $formattedTime = date("H:i:s", strtotime($row['tanggal_waktu']));
                echo "<td>".$formattedTime."</td>";
                echo "<td>".$row['nama']."</td>";
                echo "<td>".$row['nim']."</td>";
                echo "<td>".$row['semester']."</td>";
                echo "<td>".$row['prodi']."</td>";
                echo "<td>".$row['kabko']."</td>";
                echo "<td>".$row['hp']."</td>";
                echo "<td>".$row['kecenderungan']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Tidak ada data.</td></tr>";
        }

        mysqli_close($conn);
        ?>
    </table>

    <div class="pagination">
        <?php
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='?page=".$i."' class='".($i == $page ? 'active' : '')."'>".$i."</a>";
        }
        ?>
    </div>
</body>
</html>
