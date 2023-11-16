<!-- Add the necessary HTML structure -->
    <div class="form-rent">
        <div class="container">
            <h2>BlueBird</h2>
            <p>Jasa Peminjaman Bus Terpercaya</p>
            <form action="config\functions.php" class="form" method="post" id="rent-form" onsubmit="return showPopup();">
                <input type="text" name="nama" class="input" placeholder="Nama" required />
                <input type="tel" name="telepon" class="input" placeholder="Nomor Telepon" required />
                <select class="input" id="lamaSewa" name="lamaSewa" required>
                    <option value="" disabled selected>Pilih Lama Sewa</option>
                    <?php
                    for ($i = 1; $i <= 30; $i++) {
                        echo "<option value='$i'>$i hari</option>";
                    }
                    ?>
                </select>
                <input type="text" id="tanggalMulai" name="tanggalMulai" placeholder="Tanggal Mulai" class="input" readonly />
                
                <input type="text" id="tanggalSelesai" name="tanggalSelesai" placeholder="Tanggal Selesai" class="input datepicker" readonly />
                <?php

                $conn = mysqli_connect('localhost','root','','data_bis');

                if ($conn->connect_error) {
                    die("Koneksi Gagal: " . $conn->connect_error);
                }

                $query = "SELECT nama_bus FROM bus";
                $result = $conn->query($query);

                if ($result === false) {
                    die("Error dalam query: " . $conn->error);
                }

                // Tampilkan nama bus sebagai opsi radio
                echo '<p>Pilihan Bus:</p>';
                echo '<div class="form-radio">';
                while ($row = $result->fetch_assoc()) {
                    $namaBus = $row['nama_bus'];

                    // Query untuk mendapatkan harga dari bus yang dipilih
                    $queryHarga = "SELECT harga_sewa FROM bus WHERE nama_bus = '$namaBus'";
                    $resultHarga = $conn->query($queryHarga);

                    if ($resultHarga === false) {
                        die("Error dalam query harga: " . $conn->error);
                    }

                    $hargaBusRow = $resultHarga->fetch_assoc();
                    $hargaBus = $hargaBusRow['harga_sewa'];

                    echo '<label style="color:white">';
                    echo '<input type="radio" name="pilihan_bus" value="' . $namaBus . '" data-harga="' . $hargaBus . '" required /> ' . $namaBus;
                    echo '</label>';
                }
                echo '</div>';

                
                $conn->close();
                ?>
                <button name="masukan-rent" type="submit">Rent Now</button>
            </form>
        </div>
    </div>

<div class="popup" id="rent-popup">
    <div class="popup-content">
        <h2>Rincian Peminjaman</h2>
        <div id="popup-data">
        <p>Nama: <span id="popup-nama"></span></p>
        <p>Nomor Telepon: <span id="popup-telepon"></span></p>
        <p>Mulai Sewa: <span id="popup-startDate"></span></p>
        <p>Akhir Sewa: <span id="popup-endDate"></span></p>
        <p>Pilihan Bus: <span id="popup-pilihanBus"></span></p>
        <p>Total Harga Sewa: <span id="popup-totalHarga"></span></p>
        </div>
        <button onclick="closePopup()">Tutup</button>
    </div>
</div>
