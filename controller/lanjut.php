<?php

if (isset($_POST['lanjut'])) {
  include '../config/koneksi.php';

  // Menggunakan prepared statement untuk menghindari SQL Injection
  $query = "INSERT INTO pengguna (nama, nim, semester, prodi, kabko, hp, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "sssssss", $_POST['nama'], $_POST['nim'], $_POST['smt'], $_POST['menuprodi'], $_POST['menukabko'], $_POST['phone'], $_POST['password']);

  // Menjalankan prepared statement
  if (mysqli_stmt_execute($stmt)) {
    // Data berhasil disimpan
    include 'success_message.html';

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

  } else {
    echo '<p style="background-color: #f44336; color: white; padding: 10px;">Gagal menyimpan data. Error: ' . mysqli_error($conn) . '</p>';
  }
}
?>
