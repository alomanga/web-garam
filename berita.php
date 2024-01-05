<?php
session_start();
require 'Admin/functions.php';

// Periksa apakah parameter ID telah diteruskan melalui URL
if (isset($_SESSION['selected_news_id'])) {
  $id = $_SESSION['selected_news_id'];

  // Hapus sesi setelah mengambil nilai ID
  unset($_SESSION['selected_news_id']);

  // Query untuk mengambil berita dengan ID yang sesuai
  $berita = query("SELECT * FROM news WHERE id = $id");

  if (!empty($berita)) {
    $berita = $berita[0];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Bootstrap CSS -->
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!-- Font Google -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

      <!-- My Style -->
      <link rel="stylesheet" href="css/style.css">

      <!-- Responsive CSS -->
      <link rel="stylesheet" href="css/responsive.css">

      <!-- Logo Title Bar -->
      <link rel="icon" href="Assets/img/fix.png" type="image/x-icon">

      <title>News - CV. Kristal Garamindo</title>
    </head>

    <body>
      <!-- Navigasi Bar -->
      <nav class="navbar navbar-expand-lg bg-transparent position-fixed w-100">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <div class="d-flex align-items-center">
              <img src="Assets/img/fix.png" alt="" width="45" class="d-inline-block align-text-top me-2 nav-img">
              <div>
                <p class="m-0">CV. KRISTAL <br> GARAMINDO</p>
              </div>
            </div>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
              <img src="Assets/img/icons8-menu-30.png" alt="" height="35px" width="35px">
            </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item mx-2">
                <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="company.php">COMPANY</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="news.php">NEWS</a>
              </li>
              <li class="nav-item mx-1">
                <a class="nav-link" href="galeri.php">GALLERY</a>
              </li>
              <li class="nav-item mx-0">
                <a class="nav-link" href="contactUs.php">CONTACT US</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- Berita Buka -->
      <section id="Beritabuka">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h2>Berita</h2>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-12">
              <div class="gambar-isi-berita">
                <img src="Admin/img/<?= $berita["gambar"]; ?>" alt="" width="100%" height="488px">
              </div>
              <div class="tulisan-isi-berita">
                <h5><?= $berita["nama"]; ?></h5>
                <p><?= $berita["tanggal"]; ?></p>
                <p style="text-align: justify;"><?= $berita["deskripsi"]; ?></p>
              </div>
              <a href="news.php">Kembali</a>
            </div>
          </div>
        </div>
      </section>

      <!-- Footer -->
      <footer class="d-flex align-items-center position-relative">
        <div class="container-fluid">
          <div class="container">
            <div class="row">
              <div class="col-md-7">
                <a class="footer-logo" href="#">
                  <img src="Assets/img/fix.png" alt="" width="45" class="d-inline-block align-text-top me-2 logo-gambar">
                  <img src="Assets/img/Cv. Krsital Garamindo.png" alt="" width="100" class="d-inline-block align-text-top me-2 logo-tulis">
                </a>
              </div>
              <div class="col-md-5 d-flex justify-content-end menu-tulis">
                <a href="index.php" class="mx-2">HOME</a>
                <a href="company.php" class="mx-3">COMPANY</a>
                <a href="news.php" class="mx-3">NEWS</a>
                <a href="galeri.php" class="mx-2">GALLERY</a>
                <a href="contactUs.php" class="mx-3">CONTACT</a>
                <a href="Admin/login.php" class="mx-0">LOGIN</a>
              </div>
              <div class="d-flex justify-content-end sosmed">
                <a href="https://www.instagram.com/cvkrinstalgaramindo/" target="_blank">
                  <img src="Assets/img/instagram-logo.png" alt="" width="100%" height="35px">
                </a>
                <div style="margin-left: 10px;">
                  <a href="https://www.linkedin.com/in/cvkristal-garamindo/" target="_blank">
                    <img src="Assets/img/linkedin-logo.png" alt="" width="100%" height="35px">
                  </a>
                </div>
              </div>
            </div>
            <div class="row position-absolute copyright start-50 translate-middle">
              <div class="col-12">
                <p> &copy; 2023 CV. Kristal Garamindo | Powered by UNDIPA Makassar Internship</p>
              </div>
            </div>
          </div>
        </div>
      </footer>

      <script src="JavaScript/script.js"></script>
      <!-- Optional JavaScript; choose one of the two! -->

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Option 2: Separate Popper and Bootstrap JS -->
      <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    </body>

    </html>

<?php
  } else {
    echo "Berita tidak ditemukan.";
  }
} else {
  echo "ID berita tidak ditemukan.";
}
?>