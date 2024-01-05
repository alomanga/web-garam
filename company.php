<?php
require 'Admin/functions.php';
$isi = query("SELECT * FROM organisasi");
$isiDoc = query("SELECT * FROM dokumen");
?>

<!doctype html>
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

  <title>Company - CV. Kristal Garamindo</title>
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
            <a class="nav-link" aria-current="page" href="index.php">HOME</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link active" href="company.php">COMPANY</a>
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

  <!-- Company -->
  <section id="halaman">
    <img src="Assets/img/cover-company.png" alt="" width="100%" height="350px" class="com-pic">

    <div class="container">
      <div class="row mt-5">
        <div class="col-12">
          <div class="judul-sejarah">
            <h2>Sejarah CV. Kristal Garamindo</h2>
          </div>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-12">
          <div class="isi-sejarah">
            <p>Perusahaan ini berdiri pada tahun 2008, yang pada awalnya adalah sebuah usaha kecil menengah. Sebelumnya, CV Kristal Garamindo menggunakan sistem mekanisasi dan tergabung dalam kelompok petambak garam bernama "Kelompok Tani Karya Bersama," yang melakukan pengolahan garam secara manual dan berproduksi di kolom rumah. Kemudian, pada tahun 1990, perusahaan ini berubah menjadi PT. Karya Bersama, di mana beberapa unit usaha digabungkan.
              <br><br>
              Kemudian, pada tahun 2008, perusahaan ini dibentuk menjadi CV. Kristal Garamindo khusus untuk usaha di bidang garam. Selain memiliki lahan garam sendiri, kami juga bermitra dengan petani melalui kelompok dan koperasi seperti Koppas Utama dan KSU Garam Mekar di Kabupaten Jeneponto. Kami juga bermitra dengan kelompok usaha garam di Kabupaten Takalar, Pangkep, dan Bima. Garam yang dihasilkan digunakan sebagai bahan baku industri dan garam konsumsi. Koppas Utama merupakan anggota koperasi primer dari Koperasi Sekunder secara Nasional di Koperasi Induk Garam Nasional, yang meliputi wilayah Sumatra, Jawa, Nusa Tenggara, dan Sulawesi.
              <br><br>
              Selama 15 tahun, fokus kami adalah pada proses produksi dan peningkatan kualitas di tambak sebagai bahan baku garam konsumsi. Pada tahun 2008, CV. Kristal Garamindo membangun industri pengolahan garam konsumsi. Mesin-mesin dalam industri ini didesain dan dibuat oleh putra-putri Jeneponto. Mesin-mesin ini disesuaikan dengan karakteristik bahan baku lokal tetapi dapat menghasilkan garam konsumsi yang sesuai dengan Standar Nasional Indonesia (SNI). Akhirnya, pada tahun 2015, kami tidak hanya memproduksi garam konsumsi tetapi juga memiliki fasilitas pengolahan garam industri.
            </p>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-6 text-center">
          <div class="visi-company">
            <h3>Visi</h3>
            <br><br><br><br>
            <p>“Menjadi perusahaan pelopor garam dari rakyat (Lokal) untuk indonesia”</p>
          </div>
        </div>

        <div class="col-md-6">
          <div class="misi-company">
            <h3>Misi</h3>
            <ul style="text-align: justify;">
              <li>INSPIRE
                <ul>
                  <li>Pemanfaatan sumber daya alam untuk meningkatkan perekonomian masyarakat</li>
                </ul>
              </li>
              <li>IMPACT
                <ul>
                  <li>Meningkatkan kesejateraan masyarakat khususnya petani garam</li>
                  <li>Kemitraan antara cv kristal garamindo dengan petani garam rakyat</li>
                </ul>
              </li>
              <li>GROW
                <ul>
                  <li>Meningkatkan kesejateraan masyarakat khususnya petani garam</li>
                  <li>Kemitraan antara cv kristal garamindo dengan petani garam rakyat</li>
                  <li>Membangun daya saing garam Rakyat lokal dengan garam lain</li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Struktur Organisasi -->
  <section id="struc-organisasi">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="judul-struktur">
            <h2>Struktur Organisasi</h2>
          </div>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-12">
          <div class="isi-struktur text-center">
            <?php foreach ($isi as $row) : ?>
              <img src="Admin/img/<?= $row["gambar"]; ?>" alt="" width="650" height="100%" style="display: inline-block;">
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Sertifikasi -->
  <section id="sertifikasi">
    <div class="container">
      <div class="row mt-3">
        <div class="col-12">
          <div class="judul-sertifikasi">
            <h2>Sertifikasi</h2>
          </div>
        </div>
      </div>

      <div class="row mt-2">
        <div class="col-12">
          <div class="isi-sertifikasi">
            <ul>
              <?php foreach ($isiDoc as $row) : ?>
                <li><a href="Admin/png/<?= $row["berkas"]; ?>" target="_blank"><?= $row["nama"]; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
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
              <div class="d-flex align-items-center">
                <img src="Assets/img/fix.png" alt="" width="45" class="d-inline-block align-text-top me-2 nav-img">
                <p class="m-0">CV. KRISTAL <br> GARAMINDO</p>
              </div>
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