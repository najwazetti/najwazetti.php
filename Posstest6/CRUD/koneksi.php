<?php
$host = 'localhost'; //Nama Host
$username = 'root'; //Username Database
$password = ''; //Password Database
$database = 'byredo'; //Nama Database

// Koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
} else {
    // Cek di consolenya F12
    echo '<script>console.log("Berhasil Konek");</script>';
}
?>