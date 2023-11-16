<?php include('../config/functions.php');

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
    <link rel="stylesheet" href="update-data.css">
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
        <?php
        $id = getDataById($_GET['id'])[0]['id'];
        $namaBus = getDataById($_GET['id'])[0]['nama_bus'];
        $fasilitas = getDataById($_GET['id'])[0]['fasilitas'];
        $jumlahUnit = getDataById($_GET['id'])[0]['jumlah_unit'];
        $hargaSewa = getDataById($_GET['id'])[0]['harga_sewa'];
        $namaGambar = getDataById($_GET['id'])[0]['gambar'];
        ?>
        <div class="menu">
            <a href="index.php">Daftar Bus</a>
            <a href="tambah-data.php">Tambah Data</a>
        </div>
        <div class="content">
            <h1>Edit Data Bus</h1>
            <form method="post" action="../config/functions.php?id=<?= $id ?>" enctype="multipart/form-data">
                <div class="wrap">
                    <div class="kiri">
                        <div class="margin-top-2 form-group">
                            <label for="nama-bus">Nama Bus</label>
                            <input type="text" name="nama-bus" id="nama-bus" value="<?= $namaBus ?>">
                        </div>
                        <div class="margin-top-2 form-group">
                            <label for="fasilitas">Fasilitas ( pisahkan dengan tanda koma )</label>
                            <input type="text" name="fasilitas" id="fasilitas" value="<?= $fasilitas ?>">
                        </div>
                    </div>
                    <div class="kanan">
                        <div class="margin-top-2 form-group">
                            <label for="jumlah-unit">Jumlah Unit</label>
                            <input type="number" name="jumlah-unit" id="jumlah-unit" value="<?= $jumlahUnit ?>">
                        </div>
                        <div class="margin-top-2 form-group">
                            <label for="harga-sewa">Harga Sewa</label>
                            <input type="number" name="harga-sewa" id="harga-sewa" value="<?= $hargaSewa ?>">
                        </div>
                    </div>
                </div>
                <div class="margin-top-2 form-group gambar">
                    <p>Gambar Lama</p>
                    <img src="gambar-upload/<?= $namaGambar ?>" alt="">
                </div>
                <div class="margin-top-2 form-group">
                    <label for="gambar">Edit Gambar</label>
                    <input type="file" name="gambar" id="gambar">
                </div>
                <div class="margin-top2">
                    <button type="submit" name="edit-bus" class="btn-edit">Edit Data</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>