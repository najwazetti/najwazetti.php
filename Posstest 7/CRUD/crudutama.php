<?php

require 'koneksi.php';

// tambah data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $notelp = $_POST['notelp'];
    $pesan = $_POST['pesan'];

    $sql = "INSERT INTO form (nama, email, notelp, pesan) VALUES ('$nama', '$email', '$notelp', '$pesan')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data berhasil ditambahkan.");</script>';
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
    header('Location: ../admins.php');
}



// Update Data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $notelp = $_POST['notelp'];
    $pesan = $_POST['pesan'];

    $sql = "UPDATE form SET nama='$nama', email='$email', notelp='$notelp', pesan='$pesan' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data berhasil Update.");</script>';
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
    header('Location: ../admins.php');
}

// Hapus Data
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $id = $_GET['id'];

    // Perform the deletion operation based on the ID
    $sql = "DELETE FROM form WHERE id='$id'";
    
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data berhasil dihapus.");</script>';
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
    header('Location: ../admins.php');
}




?>


