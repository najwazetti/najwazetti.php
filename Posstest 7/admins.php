<?php

include 'CRUD/koneksi.php';

$id = isset($_GET["id"]) ? $_GET["id"] : null;


if (!empty($id)) {
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = $id");
    $row = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        .update-form {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="admins.css">
</head>

<body>
    <div class="navbar">
        <a href="#" id="showAddForm">Tambah Data</a>
        <a href="index.php">Logout</a>
    </div>

    <div id="dataContainer">
        <h2>Tabel Data Kontak</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. Telp</th>
                <th>Pesan</th>
                <th>Aksi</th>
            </tr>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM form");
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['notelp'] ?></td>
                    <td><?= $row['pesan'] ?></td>
                    <td>
                        <form method="post">
                            <button type="button" class="btn" onclick="showUpdateForm(<?= $row['id'] ?>)">Update</button>
                            <a name="delete" href="CRUD/crudutama.php?id=<?= $row['id']; ?>&action=delete" class="btn">Delete</a>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>


    <div id="addForm" style="display: none;">
        <h2>Tambah Data Kontak</h2>
        <form method="post" action="CRUD/crudutama.php">
            <div class="input-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>

            <div class="input-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>

            <div class="input-group">
                <label for="notelp">No. Telp:</label>
                <input type="text" id="notelp" name="notelp" required>
            </div>

            <div class="input-group">
                <label for="pesan">Pesan:</label>
                <textarea id="pesan" name="pesan" required></textarea>
            </div>

            <button type="submit" name="submit" class="btn">Tambah Data</button>
        </form>
    </div>


    <div id="updateForm" style="display: none;">
        <h2>Update Data Kontak</h2>
        <form method="post" action="CRUD/crudutama.php">
            <input type="hidden" name="id" id="update_id">
            <div class="input-group">
                <label for="update_nama">Nama:</label>
                <input type="text" id="update_nama" name="nama" required>
            </div>

            <div class="input-group">
                <label for="update_email">Email:</label>
                <input type="text" id="update_email" name="email" required>
            </div>

            <div class="input-group">
                <label for="update_notelp">No. Telp:</label>
                <input type="text" id="update_notelp" name="notelp" required>
            </div>

            <div class="input-group">
                <label for="update_pesan">Pesan:</label>
                <textarea id="update_pesan" name="pesan" required></textarea>
            </div>

            <button type="submit" name="update" class="btn">Update Data</button>
        </form>
    </div>

    <script>
// JavaScript code to toggle form visibility
document.getElementById('showAddForm').addEventListener('click', function() {
    var addForm = document.getElementById('addForm');
    var updateForm = document.getElementById('updateForm');
    addForm.style.display = 'block';
    updateForm.style.display = 'none';
});

function showUpdateForm(id) {
    var updateForm = document.getElementById('updateForm');
    var update_id = document.getElementById('update_id');
    var update_nama = document.getElementById('update_nama');
    var update_email = document.getElementById('update_email');
    var update_notelp = document.getElementById('update_notelp');
    var update_pesan = document.getElementById('update_pesan');

    // Setel nilai id dalam formulir
    update_id.value = id;

    // Dapatkan data dari tabel dan isi formulir edit
    var table = document.querySelector('table');
    var rows = table.querySelectorAll('tr');

    for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].querySelectorAll('td');
        if (cells.length > 0 && cells[0].innerText == id) {
            update_nama.value = cells[1].innerText;
            update_email.value = cells[2].innerText;
            update_notelp.value = cells[3].innerText;
            update_pesan.value = cells[4].innerText;
            break;
        }
    }

    // Tampilkan formulir edit
    updateForm.style.display = 'block';
    document.getElementById('addForm').style.display = 'none';
}

    </script>

</body>

</html>