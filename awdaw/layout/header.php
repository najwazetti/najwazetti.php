<?php

$user = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
$admin = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : null;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Sewa Bis PO. BlueBird</title>
    <link rel="stylesheet" href="rent.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/pngegg.png">
</head>

<body>
    <nav class="navbar">
        <h1 class="logo"><img src="images/logo.png" alt="logo" srcset="" width="200px"></h1>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <?php
            if ($user) {
                echo '<li><a href="index.php#catalog">Catalog</a></li>';
            }
            ?>
            <?php
            if ($user) {
                echo '<li><a href="rent.php">Rent</a></li>';
            }
            ?>
            <li><a href="index.php#about">About Us</a></li>
            <?php
            if ($admin) {
                echo '<li><a href="admin/index.php">Admin</a></li>';
            }
            ?>
            <?php
                if ($user) {
                    // Jika sudah login, tampilkan tombol Logout
                    echo '<li><a href="logout.php">Logout</a></li>';
                } else if($admin){
                    echo '<li><a href="logout.php">Logout</a></li>';
                } else {
                    // Jika belum login, tampilkan tombol Login
                    echo '<li><a href="login_form.php">Login</a></li>';
                }
                ?>
            <li>
                <div class="switch">
                    <input type="checkbox" id="darkModeToggle">
                    <label for="darkModeToggle"></label>
                </div>
            </li>
        </ul>
        <img src="images/bars-solid.svg" width="20px" class="menu-btn">
    </nav>