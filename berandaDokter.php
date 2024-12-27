<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poliklinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
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
    </style>
    <nav class="navbar fixed-top navbar-expand-lg py-3">
        <div class="container d-flex align-items-center">
            <img src="images/logo.jpg" alt="Logo" width="40" height="40" class="d-inline-block align-text-top me-2">
            <a class="navbar-brand font-bold" href="berandaDokter.php">Poliklinik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <?php
                if (isset($_SESSION['nip'])) {
                    // Jika pengguna sudah login, tampilkan menu navigasi dan tombol "Logout"
                ?>
                    <ul class="navbar-nav ms-auto d-flex align-items-lg-center">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="berandaDokter.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="berandaDokter.php?page=periksa">Periksa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="berandaDokter.php?page=riwayat">Riwayat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="berandaDokter.php?page=aturJadwalDokter">Set Jadwal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout (<?php echo $_SESSION['nip'] ?>)</a>
                        </li>
                    </ul>
                <?php
                } else {
                    // Jika pengguna belum login, tampilkan tombol "Login"
                ?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=loginDokter">Login</a>
                        </li>
                    </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>



    <main role="main" class="container" style="margin-top: 5rem;">
        <?php
        if (isset($_GET['page'])) {
            include($_GET['page'] . ".php");
        } else {
            echo "<br><h2>Selamat Datang di Poliklinik";

            if (isset($_SESSION['nama'])) {
                //jika sudah login tampilkan nip
                echo ", " . $_SESSION['nama'] . "</h2><hr>";
            } else {
                echo "</h2><hr>Silakan Login untuk menggunakan sistem.";
            }
        }
        ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/71c2ab2c83.js" crossorigin="anonymous"></script>
</body>

</html>