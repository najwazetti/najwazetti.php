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

    // Query SQL untuk menambahkan data ke database
    $query = "INSERT INTO form (nama, email, notelp, pesan) VALUES ('$nama', '$email', '$notelp', '$pesan')";

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
