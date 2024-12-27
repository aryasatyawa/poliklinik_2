<?php
if (!isset($_SESSION)) {
  session_start();
}

include_once("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8 ">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Poliklinik</title>
  <link rel="stylesheet" href="css/index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    body {
      background-color: #F9FAFB;
    }

    nav.navbar {
      background-color: white;
      border-bottom: 1px lightgrey;
      box-shadow: 0px 4px 2px -2px rgba(0, 0, 0, 0.2);
    }

    nav.navbar a.navbar-brand,
    nav.navbar button.navbar-toggler {
      color: #1F2937;
    }

    nav.navbar a.nav-link,
    nav.navbar button.btn-dark {
      color: #1F2937;
      transition: color 0.3s;
    }

    nav.navbar a.nav-link:hover,
    nav.navbar button.btn-dark:hover {
      color: #ffc107;
    }

    nav.navbar a.nav-link,
    nav.navbar a.navbar-brand,
    nav.navbar button.btn-dark {
      font-weight: bold;
    }

    .navbar .dropdown-menu {
      background-color: #007bff;
      /* Ganti dengan warna yang diinginkan */
    }

    .navbar .dropdown-item {
      color: white;
      /* Ganti dengan warna teks yang diinginkan */
    }

    main.container {
      margin-top: 8rem;
    }

    .jumbotron {
      background-color: #000080;
      color: #fff;
      padding: 5rem;
      border-radius: 30px;
    }

    .jumbotron h1,
    .jumbotron h2 {
      margin-bottom: 0.5rem;
    }

    /* Gaya tambahan */
    .hero-section {
      height: 100vh;
      display: flex;
      align-items: center;
      background-color: #f9f9f9;
    }

    .hero-text {
      max-width: 600px;
    }

    .hero-text h1 {
      font-size: 3rem;
      font-weight: bold;
      color: #007bff;
    }

    .hero-text h1 span {
      color: #00d4ff;
    }

    .hero-text p {
      font-size: 1.2rem;
      color: #6c757d;
    }

    .card {
      background-color: #f9f9f9;
    }

    .card-header {
      background-color: #007bff;
      color: white;
      font-size: 1.5rem;
    }

    .form-control {
      background-color: #f1f1f1;
      border: 2px solid #ddd;
      border-radius: 25px;
    }

    .form-control:focus {
      border-color: #007bff;
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      width: 100%;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
</head>

<body>

  <nav class="navbar fixed-top navbar-expand-lg py-3">
    <div class="container d-flex align-items-center">
      <img src="images/logo.jpg" alt="Logo" width="40" height="40" class="d-inline-block align-text-top me-2">
      <a class="navbar-brand font-bold" href="index.php">Poliklinik</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <?php
        if (isset($_SESSION['username'])) {
          // Jika pengguna sudah login, tampilkan tombol "Logout"
        ?>
          <ul class="navbar-nav d-flex align-items-lg-center ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Dokter
              </button>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="index.php?page=dokter">Data Dokter</a></li>
                <li><a class="dropdown-item" href="index.php?page=jadwalDokter">Jadwal Dokter</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=poli">Poli</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=obat">Obat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=pasien">Pasien</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="Logout.php">Logout (<?php echo $_SESSION['fullname'] ?>)</a>
            </li>
          </ul>
        <?php
        } else {
          // Jika pengguna belum login, tampilkan tombol "Login" dan "Register"
        ?>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link fw-bold" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="index.php?page=cekRM">Rawat Jalan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="index.php?page=loginUser">Login</a>
            </li>
          </ul>
        <?php
        }
        ?>
      </div>
    </div>
  </nav>

  <main role="main" class="container">
    <?php
    if (isset($_GET['page'])) {
      include($_GET['page'] . ".php");
    } else {
      echo '<div class="container-fluid hero-section">
        <div class="container">
          <div class="row align-items-center">
            <!-- Teks -->
            <div class="col-lg-6 hero-text">
              <h1>SELAMAT DATANG <br> <span>DI POLIKNIK KAMI</span></h1>
              <p>Silahkan pilih menu login untuk masuk ke dalam akun pasien serta pilih rawat jalan jika ingin mendaftarkan akun pasien baru, Jika sudah login maka dapat memilih pelayanan kami yang tersedia</p>
            </div>
            <!-- Gambar -->
            <div class="col-lg-6 text-center">
              <img src="images/bgwoman2.jpg" alt="Doctor Image" class="img-fluid rounded">
            </div>
          </div>
        </div>
      </div> ';
      if (isset($_SESSION['username'])) {
        //jika sudah login tampilkan username
        echo '. ' . $_SESSION['fullname'] . '</h2><hr></div>';
      } else {
        echo '</h2><p class="lead">Login terlebih dahulu</p></div>';
      }
    }
    ?>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/71c2ab2c83.js" crossorigin="anonymous"></script>
</body>

</html>