<?php
include 'koneksi.php';

if (isset($_POST['nama']) && isset($_POST['email']) && isset($_POST['notelp']) && isset($_POST['pesan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $notelp = $_POST['notelp'];
    $pesan = $_POST['pesan'];

    // Lindungi dari SQL Injection
    $nama = mysqli_real_escape_string($conn, $nama);
    $email = mysqli_real_escape_string($conn, $email);
    $notelp = mysqli_real_escape_string($conn, $notelp);
    $pesan = mysqli_real_escape_string($conn, $pesan);

    // Proses file gambar yang diunggah
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $ext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION)); // Mendapatkan ekstensi file
    $new_filename = date('Y-m-d') . ' ' . $nama . '.' . $ext; // Format nama file: yyyy-mm-dd nama-file.ekstensi
    $gambar_path = "../gambar_data_kontak/" . $new_filename;

    // Pindahkan file gambar dari temporary location ke folder tujuan
    move_uploaded_file($gambar_tmp, $gambar_path);

    // Query SQL untuk menambahkan data ke database
    $query = "INSERT INTO form (nama, email, notelp, pesan, gambar) VALUES ('$nama', '$email', '$notelp', '$pesan', '$new_filename')";

    if (mysqli_query($conn, $query)) {
        echo "Data berhasil ditambahkan. Terima kasih!";
        header('Location: ../index.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Data tidak lengkap. Harap isi semua bidang.";
}
?>