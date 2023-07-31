<?php
if (isset($_POST['lanjut'])) {
  include '../config/koneksi.php';

  // Menggunakan prepared statement untuk menghindari SQL Injection
  $query = "INSERT INTO pengguna (nama, nim, semester, prodi, kabko, hp) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "ssssss", $_POST['nama'], $_POST['nim'], $_POST['smt'], $_POST['menuprodi'], $_POST['menukabko'], $_POST['phone']);

  // Menjalankan prepared statement
  if (mysqli_stmt_execute($stmt)) {
    // Data berhasil disimpan, alihkan ke halaman berikutnya
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // Ubah lokasi halaman berikutnya sesuai kebutuhan (misalnya: form_pertanyaan.php)
    header("Location: tes.php");
    exit(); // Pastikan exit() digunakan setelah header() untuk mencegah eksekusi lebih lanjut pada halaman ini.
  } else {
    echo 'gagal menyimpan data. Error: ' . mysqli_error($conn);
  }
}
?>

