<?php
session_start();

// Hapus session untuk logout
session_destroy();


//Tentukan server untuk lokasi path
$path = $_SERVER['localhost'].'/TIA';


// Redirect ke halaman login setelah logout
header("Location: $path/user/home.php");
exit();
?>
