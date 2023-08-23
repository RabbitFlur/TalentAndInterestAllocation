<?php
session_start();

// Jika pengguna belum login, arahkan ke halaman login
if (!isset($_SESSION['id'])) {
    header("Location: administrator.php");
    exit();
}
include '../controller/check_session.php';

// Menghubungkan ke database
include '../config/koneksi.php';

// Pengecekan jika parameter NIM dikirimkan
$nimFilter = isset($_GET['nim']) ? $_GET['nim'] : '';

$results_per_page = 5; // Jumlah hasil per halaman

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
?>
<?php include '../template/header.php'; ?>
<title>Homepage Admin</title>
    <style>
        /* Styling for the total records section */
        .total-records {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
        }

        /* Styling for the pagination */
        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            display: inline-block;
            padding: 5px 10px;
            margin: 0 5px;
            background-color: #f2f2f2d0;
            border: 1px solid #ccc;
            color: #333;
            text-decoration: none;
            border-radius: 3px;
        }

        .pagination a.active {
            background-color: #007bff;
            color: white;
        }

        /* Styling for the logout link */
        .logout {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
        }

        /* Styling for the table */
        .tabel-data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 13px;
        }

        /* Alternate row colors */
        .tabel-data tr:nth-child(even) {
            background-color: #f2f2f2d0;
        }

        .tabel-data tr:nth-child(odd) td:not(.date):not(.time) {
            background-color: #def0ffe5; /* Warna latar belakang untuk baris genap */ 
        }

        /* Header styling */
        .tabel-data th{
            background-color: #011e3dc4;
            color: white;
            font-weight: bold;
            font-size: 16px;
        }

        .tabel-data th,
        .tabel-data td {
            /* border-top: 2px solid #1E6091;
            border-bottom: 2px solid #1E6091;
            border-left: 2px solid #1E6091;
            border-right: 2px solid #1E6091; */
            padding: 10px;
            border: 1px solid #48d5dfd5; /* Tambahkan batas pada sel */
        }

        /* Hover effect */
        .tabel-data .tdhover:hover {
            background-color: #e2e8f0;
        }

        /* Format date and time */
        .tabel-data td.date,
        .tabel-data td.time {
            background-color: #1b819b77; /* Warna latar belakang lebih gelap */
            color: #526aaa; /* Warna teks lebih terang */
            white-space: nowrap;
            font-size: 14px;
            font-weight: bold;
        }

        .tabel-data td.fixrow {
            white-space: nowrap; /* Prevent text wrapping */
            overflow: hidden; /* Hide overflowing text */
            text-overflow: ellipsis; /* Add ellipsis (...) for truncated text */
        }

        /* Styling for the header section */
        .homepageadmin-background {
            background-color: #00255560;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            text-align: center;
            z-index: 1000;
            overflow: hidden;
        }

        .homepageadmin h1 {
            margin: 0;
            padding: 10px 0;
            text-align: center;
            color: #333;
        }

        .container-data {
            margin-top: 20px;
            max-height: 80vh;
            overflow: auto;
        }

        /* Gaya untuk bentuk overflow */
        .container-data::-webkit-scrollbar {
            width: 8px; /* Lebar scrollbar */
            border-radius: 4px; /* Sudut bundar scrollbar */
        }

        .container-data::-webkit-scrollbar-thumb {
            background-color: #265e8b2c; /* Warna thumb scrollbar */
            border-radius: 4px; /* Sudut bundar thumb scrollbar */
        }

        .container-data::-webkit-scrollbar-track {
            background-color: transparent; /* Warna track scrollbar */
        }

        /* Additional styles for the search form */
        .container-data form {
            margin-bottom: 15px;
        }

        .container-data label {
            font-weight: bold;
        }

        .container-data input[type="text"] {
            padding: 5px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .container-data input[type="submit"] {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .container-data input[type="submit"]:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <div class="homepageadmin">
        <div class="homepageadmin-background">
            <h1>Data Pengguna dengan Kecenderungan</h1>
            
            <div class="container-data">
                <form method="GET">
                    <label for="nim">Cari berdasarkan NIM:</label>
                    <input type="text" id="nim" name="nim" placeholder="Tuliskan NIM">
                    <input type="submit" value="Cari">
                </form>
                
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
                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<a href='?page=".$i."' class='".($i == $page ? 'active' : '')."'>".$i."</a>";
                    }
                    ?>
                </div>
                <div class="total-records">
                    <p>Total data: <?php echo $total_results; ?></p>
                </div>
                <a class="logout" href="../controller/logout_admin.php">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
