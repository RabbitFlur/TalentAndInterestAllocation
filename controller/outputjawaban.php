<?php
include '../config/koneksi.php';

$hasil = isset($_POST['hasil']) && $_POST['hasil'] === 'TRUE' ? 1 : 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Menyiapkan query SQL dengan prepared statement
  $query = "INSERT INTO hasil_formulir (linguistik, logis_matematis, kinestetik, musikal, interpersonal, intrapersonal)
            VALUES (?, ?, ?, ?, ?, ?)";

  $stmt = mysqli_prepare($connection, $query);
  if (!$stmt) {
    die("Error: " . mysqli_error($connection));
  }

  // Mengikat parameter ke prepared statement
  mysqli_stmt_bind_param($stmt, "iiiiii", $hasil, $hasil, $hasil, $hasil, $hasil, $hasil);

  // Menjalankan prepared statement
  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    $insertedId = mysqli_insert_id($connection);
    $insertMessage = "Data berhasil disimpan dengan ID: " . $insertedId;
  } else {
    $insertMessage = "Error: " . mysqli_error($connection);
  }

  // Menutup prepared statement
  mysqli_stmt_close($stmt);
}

include '../template/header.php';
?>
<title>Hasil</title>
</head>
<body>
<div class="hasil-wrapper">
    <h1>Hasil</h1>
    <div id="output">
        <?php
        if (isset($hasil)) {
          echo "<p>Hasil: " . ($hasil === 1 ? 'TRUE' : 'FALSE') . "</p>";
        }
        echo "<p>$insertMessage</p>";
        ?>
    </div>
</div>
<?php include '../template/footer.php'; ?>
