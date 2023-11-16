<?php 

include('../config/functions.php');

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
    <link rel="stylesheet" href="pesanan.css">
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
            <div class="header-content">
                <div class="datetime">
                    <span class="date">
                        <?php
                        echo date('j F Y');
                        ?>
                    </span>
                    &nbsp;
                    <span class="time">
                        <?php
                        echo date('H:i:s');
                        ?>
                    </span>
                </div>
                <h1>Data Bus Tersedia</h1>
            </div>
            <div class="scroll">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemesan</th>
                            <th>No Telepon</th>
                            <th>Harga</th>
                            <th>Lama Sewa</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach (getDataPesanan() as $pesanan) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $pesanan['nama'] ?></td>
                                <td><?= $pesanan['notelp'] ?></td>
                                <td><?= $pesanan['harga'] ?></td>
                                <td><?= $pesanan['lama_sewa'] ?></td>
                                <td><?= $pesanan['tanggal_mulai'] ?></td>
                                <td><?= $pesanan['tanggal_selesai'] ?></td>
                                <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->

                                    <td class="aksi">
                                    <div class="aksii">
                                            <a href="update-data-pesanan.php?id=<?= $pesanan['id_pesanan'] ?>">Edit</a>
                                            <a href="../config/functions.php?idHapusPesanan=<?= $pesanan['id_pesanan'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                    </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>