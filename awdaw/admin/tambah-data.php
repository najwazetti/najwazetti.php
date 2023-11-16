<?php
session_start();

if (!isset($_SESSION['admin_name'])) {
    header('Location: ../index.php');
    exit(); 
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="tambah-data.css">
</head>

<body>
    <nav>
        <div class="nabar-brand">
            <img src="../images/logo.png" alt="">
        </div>
        <div class="navbar-text">
            <a href="../index.php">Keluar Halaman Admin</a>
        </div>
    </nav>
    <div class="main">
        <div class="menu">
            <a href="index.php">Daftar Bus</a>
            <a href="tambah-data.php">Tambah Data</a>
            <a href="pesanan_pelanggan.php">Pesanan Pelanggan</a>
        </div>
        <div class="content">
            <h1>Tambah Data Bus</h1>
            <form method="post" action="../config/functions.php" enctype="multipart/form-data">
                <div class="wrap">
                    <div class="kiri">
                        <div class="margin-top-2 form-group">
                            <label for="nama-bus">Nama Bus</label>
                            <input type="text" name="nama-bus" id="nama-bus">
                        </div>
                        <div class="margin-top-2 form-group">
                            <label for="fasilitas">Fasilitas ( pisahkan dengan tanda koma )</label>
                            <input type="text" name="fasilitas" id="fasilitas">
                        </div>
                    </div>
                    <div class="kanan">
                        <div class="margin-top-2 form-group">
                            <label for="jumlah-unit">Jumlah Unit</label>
                            <input type="number" name="jumlah-unit" id="jumlah-unit">
                        </div>
                        <div class="margin-top-2 form-group">
                            <label for="harga-sewa">Harga Sewa</label>
                            <input type="number" name="harga-sewa" id="harga-sewa">
                        </div>
                    </div>
                </div>
                <div class="margin-top-2 form-group">
                    <label for="gambar">Tambah Gambar</label>
                    <input type="file" name="gambar" id="gambar">
                </div>
                <div class="margin-top2">
                    <button type="submit" name="tambah-bus" class="btn-tambah">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>