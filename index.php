<?php
session_start();
require 'Admin/functions.php';
$isi = query("SELECT * FROM news ORDER BY tanggal DESC");
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

  <title>Home - CV. Kristal Garamindo</title>
</head>

<!-- TESS PERUBAHAN GITHUB -->

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

  <!-- Hero Section -->
  <section id="hero">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-md-9 hero-tagline my-auto">
          <h1>Kualitas Garam <br>
            Terbaik di Sulawesi Selatan.</h1>
          <p>
            "<span class="fw-bold">Selamat datang</span> di website kami! <br>Temukan keunggulan garam alami kami dan dedikasi kami terhadap kualitas terbaik. <br> Garam Rakyat untuk Indonesia"
          </p>

          <a href="#Profil">
            <button class="btn btn-primary">Selengkapnya</button>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Profil Perusahaan -->
  <section id="Profil">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h2>PROFIL <br> PERUSAHAAN</h2>
          <hr>
        </div>
      </div>

      <br>

      <div class="row">
        <div class="col-12 text-center">
          <div class="video-container">
            <video controls>
              <source src="Assets/video/VID_20230921_161020.mp4">
            </video>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-6">
          <div class="card">
            <h3>The Value Of The Company</h3>
            <p>Berorientasi pada etika bisnis, kualitas layanan dan menjaga kepercayaan dari pelanggan sebagai suatu komitmen perusahaan</p>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <h3 style="text-align: center;">Mengapa memilih kami?</h3>
            <ul style="text-align: justify;">
              <li>Kami selelalu mengutamakan pelayanan yang baik dan kerjasama jangka panjang yang saling menguntungkan untuk kemajuan bersama</li>
              <li>Tim marketing sebagai jembatan dengan semua pelanggan selalu bersahabat dalam kegiatan di lapangan mulai dari prospecting, approaching, meeting, discovery need, take order, service sales, sampai maintenance customers bagi pelanggan</li>
              <li>Commitment : kami berkomitmen menjaga kepercayaan yang diberikan pelanggan dan memberikan barang bermutu serta pelayanan prima kesetiap pelanggan dan mitra.</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-12 text-center">
          <a href="company.php">Lihat Lainnya</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Berita -->
  <section id="news">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-12 text-center text-lg-start">
          <h2>BERITA</h2>
        </div>
        <div class="col-lg-3 col-md-12 d-flex justify-content-end align-items-center">
          <a href="news.php">
            <button class="buttons">Lebih Banyak</button>
          </a>
        </div>
      </div>

      <?php $i = 1; ?>
      <div class="row mt-5 d-flex">
        <?php foreach ($isi as $row) : ?>
          <?php if ($i <= 4) : ?>

            <div class="col-md-3">
              <div class="panel p-0 d-flex flex-column">
                <img src="Admin/img/<?= $row["gambar"]; ?>" alt="" width="100%" height="156px">
                <div class="panel-body flex-grow-1">
                  <p><?= $row["tanggal"]; ?></p>
                  <h5><?= $row["nama"]; ?></h5>
                  <p><?= substr($row["deskripsi"], 0, 150); ?>...</p>
                </div>
                <a href="berita.php?id=<?= $row["id"]; ?>">BACA SELENGKAPNYA</a>
              </div>
            </div>
          <?php endif; ?>
          <?php $i++; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Galeri -->
  <section id="galeri" class="overflow-hidden">
    <div class="container">
      <div class="row mb-4">
        <div class="col-lg-9 col-md-12 text-center text-lg-start">
          <h2>GALERI</h2>
        </div>
        <div class="col-lg-3 col-md-12 d-flex justify-content-end align-items-center">
          <a href="galeri.php">
            <button class="buttons">Lebih Banyak</button>
          </a>
        </div>
      </div>


      <div class="row mt-3">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="Assets/img/IMG20191213141919.jpg" class="d-block w-100" alt="">
              <div class="carousel-caption d-none d-md-block">
                <h5>PRODUK</h5>
              </div>
            </div>
            <div class="carousel-item">
              <img src="Assets/img/galeriKantor.jpg" class="d-block w-100" alt="">
              <div class="carousel-caption d-none d-md-block">
                <h5>PABRIK</h5>
              </div>
            </div>
            <div class="carousel-item">
              <img src="Assets/img/tambak.jpg" class="d-block w-100" alt="">
              <div class="carousel-caption d-none d-md-block">
                <h5>TAMBAK</h5>
              </div>
            </div>
            <div class="carousel-item">
              <img src="Assets/img/IMG20220724084100.jpg" class="d-block w-100" alt="">
              <div class="carousel-caption d-none d-md-block">
                <h5>EKSPOR</h5>
              </div>
            </div>
            <div class="carousel-item">
              <img src="Assets/img/IMG20220724083913.jpg" class="d-block w-100" alt="">
              <div class="carousel-caption d-none d-md-block">
                <h5>DISTRIBUSI</h5>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

    </div>
  </section>

  <!-- Contact Us -->
  <section id="contact">
    <div class="container-fluid overlay h-100">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3>Ingin Menghubungi kami? Silahkan Hubungi kontak dibawah ini
              <br> Kami siap membantu...
            </h3>

            <div class="row text-center">
              <div class="col-md-4">
                <div class="lokasi">
                  <img src="Assets/img/icons8-location-50.png" alt="">
                  <h6>Office & Factory Address</h6>
                  <a href="https://maps.app.goo.gl/PESFQQ9U8J6ACk7p8">
                    <p>Jl. Mawar Boronglamu, Kecamatan Arungkeke, Kab Jeneponto, Sulawesi Selatan</p>
                  </a>
                </div>
              </div>

              <div class="col-md-5">
                <div class="call">
                  <img src="Assets/img/icons8-call-50.png" alt="">
                  <h6>Call Us</h6>
                  <a href="https://wa.me/6281343990621" target="_blank">+62 813-4399-0621</a>
                  <img src="Assets/img/icons8-email-50.png" alt="">
                  <h6>Email Us</h6>
                  <a href="mailto:kristalgaramindo@gmail.com" target="_blank">kristalgaramindo@gmail.com</a>
                </div>
              </div>

              <div class="col-md-3">
                <div class="sosmet">
                  <a href="https://www.instagram.com/cvkrinstalgaramindo/" target="_blank"><img src="Assets/img/icons8-instagram-48.png" alt=""></a>
                  <a href="https://www.linkedin.com/in/cvkristal-garamindo/" target="_blank"><img src="Assets/img/icons8-linkedin-48.png" alt=""></a>
                  <h6>Social Media</h6>
                </div>
              </div>

              <div class="col-lg-12">
                <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1dYOUR_LONGITUDE!2dYOUR_LATITUDE!3dYOUR_ZOOM_LEVEL!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db949f84278fbb1%3A0x2c468d480d3117a4!2sGudang%20garam%20CV.KRISTAL%20GARAMAINFO!5e0!3m2!1sen!2sus!4v1638297577000!5m2!1sen!2sus" allowfullscreen></iframe>
              </div>
            </div>
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