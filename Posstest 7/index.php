<?php
// Inisialisasi variabel
$nama = $email = $phone = $message = "";

// Cek apakah data form telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Tangkap data yang dikirimkan dengan menggunakan filter_input untuk memastikan keamanan
  $nama = filter_input(INPUT_POST, "nama", FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
  $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_STRING);
  $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);

  // Lakukan operasi lain yang Anda butuhkan di sini, seperti menyimpan data ke database

  // Tampilkan pesan sukses atau tindakan selanjutnya
  echo "<script>alert('Nama: $nama, Email: $email, Phone: $phone, Message: $message');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inclusive+Sans:ital@1&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://unpkg.com/feather-icons"></script>

  <link rel="stylesheet" href="Posttest 3.css" />
  <title>BYREDO PARFUME</title>
</head>

<body>
  <!-- Navbar start -->
  <nav class="navbar">
    <a href="#" class="navbar-logo">BYREDO</a>

    <div class="navbar-nav">
      <a href="#">Home</a>
      <a href="#about">About Us</a>
      <a href="#parfume">Parfume</a>
      <a href="#contact">Contact Us</a>
    </div>

    <div class="navbar-extra">
      <a href="#" id="search"><i data-feather="search"></i></a>
      <a href="index.php" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
    </div>

    <div class="btn">
      <div class="btn_indicator">
        <div class="btn_icon-container">
          <i class="btn_icon fa-solid fa-sun"></i>
        </div>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- body start -->
  <section class="utama" id="home">
    <main class="content">
      <h1>Sweet Smelling <br />Perfume</h1>
      <p>
        For the best living experience with Freshness, Sweetest and Elegance
      </p>
      <a href="index.php" class="cta">Buy Now</a>
    </main>
  </section>
  <!-- body end -->

  <!-- About Start -->
  <section id="about" class="about">
    <h2><span>ABOUT</span> US</h2>

    <div class="row">
      <div class="about-img">
        <img src="byredo1.jpg" alt="About us">
      </div>

      <div class="content">
        <h3>Why BYREDO?</h3>
        <P>
          Byredo is a European luxury brand founded in Stockholm in 2006 by Ben Gorham, with an ambition to translate memories and emotions into products and experiences.<br>
          <br>Byredo is reinventing the world of luxury through a new approach, where creation is led by emotions, expressing a full and limitless brand universe.<br>
          <br>Byredo conceives objects using the highest quality materials available, and high-end design details to fuel a renewed approach to modern luxury.<br>
          <br>We believe that through creativity, we are able to develop timeless products, both meaningful and inspirational, to people and their lives.
        </p>
      </div>
    </div>
  </section>
  <!-- About End -->

  <!-- Menu Start -->
  <script>
    function tampilkanForm() {
      // Tampilkan form pemesanan
      document.getElementById("index.php").style.display = "block";
    }
  </script>
  <section id="parfume" class="menu">
    <h2><span>By</span>product</h2>
    <div class="row">
      <div class="menu-card">
        <a href="index.php">
          <img src="menu1.jpg" alt="parfume" class="menu-card-img">
        </a>
        <h3 class="menu-card-title"> Mojave Ghost </h3>
        <p class="menu-card-price">IDR 1.5K</p>
      </div>

      <div class="menu-card">
        <a href="index.php">
          <img src="menu2.jpg" alt="parfume" class="menu-card-img">
        </a>
        <h3 class="menu-card-title"> Gypsy Water </h3>
        <p class="menu-card-price">IDR 1.2K</p>
      </div>

      <div class="menu-card">
        <a href="index.php">
          <img src="menu3.jpg" alt="parfume" class="menu-card-img">
        </a>
        <h3 class="menu-card-title"> Blanche </h3>
        <p class="menu-card-price">IDR 1.5K</p>
      </div>

      <div class="menu-card">
        <a href="index.php">
          <img src="menu5.jpg" alt="parfume" class="menu-card-img">
        </a>
        <h3 class="menu-card-title"> Reine de Nuit </h3>
        <p class="menu-card-price">IDR 1.8K</p>
      </div>

      <div class="menu-card">
        <a href="index.php">
          <img src="menu6.jpg" alt="parfume" class="menu-card-img">
        </a>
        <h3 class="menu-card-title"> Sellier </h3>
        <p class="menu-card-price">IDR 1.8K</p>
      </div>

      <div class="menu-card">
        <a href="index.php">
          <img src="menu77.jpg" alt="parfume" class="menu-card-img">
        </a>
        <h3 class="menu-card-title"> Black Saffron</h3>
        <p class="menu-card-price">IDR 1.8K</p>
      </div>

      <div class="menu-card">
        <a href="index.php">
          <img src="menu8.jpg" alt="parfume" class="menu-card-img">
        </a>
        <h3 class="menu-card-title"> La Sélection BYREDO </h3>
        <p class="menu-card-price">IDR 1.2K</p>
      </div>

      <div class="menu-card">
        <a href="index.php">
          <img src="menu9.jpg" alt="parfume" class="menu-card-img">
        </a>
        <h3 class="menu-card-title"> Rose of No Man's Land</h3>
        <p class="menu-card-price">IDR 465K</p>
      </div>
  </section>

  <section class="paragraf">
    <div class="para">
      <h3> Exclusive services</h3>
      <p> &mdash; Free shipping<br>
        &mdash; 30 days free returns<br>
        &mdash; Secure payments<br>
        &mdash; BYREDO wrapping<br>
        &mdash; Complimentary samples of your choice</p>
    </div>
  </section>
  <!-- Menu End -->

  <!-- Footer Start -->
  <section id="contact" class="contact">
    <h2><span>Our</span>Contact</h2>
    <div class="row">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d33340023.638259236!2d-17.787105000000015!3d59.334397100000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465f9d5ddd743f81%3A0xf3d42728ba15ae48!2sBYREDO%20Stockholm!5e0!3m2!1sen!2sid!4v1695639767421!5m2!1sen!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>


      <form method="post" action="CRUD/tambah.php">
        <p>Welcome to BYREDO <br>
          How can we help you?</p>
        <div class="input-grup">
          <i data-feather="user"></i>
          <input type="text" placeholder="Name" name="nama" required>
        </div>

        <div class="input-grup">
          <i data-feather="mail"></i>
          <input  placeholder="Email" type="text" id="email" name="email" required>
        </div>

        <div class="input-grup">
          <i data-feather="phone"></i>
          <input placeholder="No Telp" type="text" id="notelp" name="notelp" required>
        </div>

        <div class="input-grup">
          <i data-feather="message-square"></i>
          <input type="text" placeholder="Message" name="pesan" required>
        </div>
        <button type="submit2" class="btn">Send mail</button>
      </form>
    </div>  
  </section>
  <!-- Footer End -->

  <!-- Footer2 Start -->
  <footer>
    <div class="socials">
      <a href="https://www.instagram.com/officialbyredo/"><i data-feather="instagram"></i></a>
      <a href="https://twitter.com/Byredo"><i data-feather="twitter"></i></a>
      <a href="https://www.byredo.com/eu_en/"><i data-feather="phone-call"></i></a>
    </div>

    <div class="links">
      <a href="me.html">About Creator</a>
    </div>

    <div class="credit">
      <p> &copy; <a href="">Najwazetti</a> 2023</p>
    </div>
  </footer>
  <!-- Footer2 End -->

  <script src="main.js"></script>

  <script>
    feather.replace();

    
</script>


</body>

    

</html>