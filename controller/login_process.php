<?php
session_start();

//Tentukan server untuk lokasi path
$path = $_SERVER['localhost'].'/TIA';

if (isset($_POST['nim']) && isset($_POST['password'])) {
    include '../config/koneksi.php'; // Memanggil file koneksi.php

    $nim = $_POST['nim'];
    $password = $_POST['password'];

    // Menghindari SQL Injection dengan menggunakan prepared statement
    $query = "SELECT * FROM pengguna WHERE nim = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $nim, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        // Login berhasil
        $row = mysqli_fetch_assoc($result);
        $_SESSION['logged_in'] = true;
        $_SESSION['nama'] = $row['nama'];
        header("location: $path/user/beranda.php");
        // header("Location: beranda.php"); 
        exit();
    } else {
        // Login gagal
        echo 'Login gagal. NIM atau Password salah.';
    }

    mysqli_close($conn);
}
?>
