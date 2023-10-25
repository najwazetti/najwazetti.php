<?php

require 'koneksi.php';

// tambah data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $notelp = $_POST['notelp'];
    $pesan = $_POST['pesan'];

    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $ext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION)); // Mendapatkan ekstensi file
    $new_filename = date('Y-m-d') . ' ' . $nama . '.' . $ext; // Format nama file: yyyy-mm-dd nama-file.ekstensi
    $gambar_path = "../gambar_data_kontak/" . $new_filename;

    // Pindahkan file gambar dari temporary location ke folder tujuan
    move_uploaded_file($gambar_tmp, $gambar_path);

    $sql = "INSERT INTO form (nama, email, notelp, pesan, gambar) VALUES ('$nama', '$email', '$notelp', '$pesan', '$new_filename')";

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

    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $ext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION)); // Mendapatkan ekstensi file
    $new_filename = date('Y-m-d') . ' ' . $nama . '.' . $ext; // Format nama file: yyyy-mm-dd nama-file.ekstensi
    $gambar_path = "../gambar_data_kontak/" . $new_filename;

    // Menghapus file gambar sebelumnya jika ada
    $old_image_path = "../gambar_data_kontak/" . getOldImageName($id); // Ganti dengan fungsi yang mengembalikan nama file gambar lama berdasarkan ID
    if (file_exists($old_image_path)) {
        unlink($old_image_path);
    }

    // Pindahkan file gambar dari temporary location ke folder tujuan
    move_uploaded_file($gambar_tmp, $gambar_path);

    $sql = "UPDATE form SET nama='$nama', email='$email', notelp='$notelp', pesan='$pesan', gambar='$new_filename' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data berhasil diperbarui.");</script>';
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($conn);
    }
    header('Location: ../admins.php');
}



//delete
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $id = $_GET['id'];

    // Menghapus file gambar terkait sebelum menghapus data
    $image_path = "../gambar_data_kontak/" . getOldImageName($id); // Ganti dengan fungsi yang mengembalikan nama file gambar berdasarkan ID
    if (file_exists($image_path)) {
        unlink($image_path);
    }

    // Melakukan operasi penghapusan berdasarkan ID
    $sql = "DELETE FROM form WHERE id='$id'";
    
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data berhasil dihapus.");</script>';
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
    header('Location: ../admins.php');
}


// Fungsi untuk mendapatkan nama file gambar lama berdasarkan ID
function getOldImageName($id) {
    require 'koneksi.php';
    // Query database atau menggunakan metode lainnya sesuai dengan logika Anda untuk mendapatkan nama file gambar lama berdasarkan ID
    // Contoh:
    $result = mysqli_query($conn, "SELECT gambar FROM form WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
    return $row['gambar'];
}



?>


