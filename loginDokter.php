<?php
if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nip = $_POST['nip'];
    $password = $_POST['password'];

    $query = "SELECT * FROM dokter WHERE nip = '$nip'";
    $result = $mysqli->query($query);

    if (!$result) {
        die("Query error: " . $mysqli->error);
    }

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['nip'] = $nip;
            $_SESSION['nama'] = $row['nama'];
            header("Location: berandaDokter.php");
        } else {
            $error = "password salah";
        }
    } else {
        $error = "User tidak ditemukan";
    }
}
?>

<main id="logindokter-page">
    <div class="container" style="margin-top: 10rem;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg rounded">
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="mb-4" style="font-weight: bold; color: #007bff;">Login</h2>
                        </div>
                        <form method="POST" action="index.php?page=loginDokter">
                            <?php
                            if (isset($error)) {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $error . '
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>';
                            }
                            ?>
                            <div class="form-group">
                                <label for="nip">NIP Dokter</label>
                                <input type="text" name="nip" class="form-control" required placeholder="Masukkan NIP Anda" style="border-radius: 25px;">
                            </div>
                            <div class="form-group mt-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required placeholder="Masukkan password Anda" style="border-radius: 25px;">
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-outline-primary px-4 btn-block">Login</button>
                            </div>
                        </form>
                        <div class="text-center mt-2">
                            <p class="mt-1">Login sebagai admin? <a href="index.php?page=loginUser" style="color: #007bff; text-decoration: none;">Saya Admin</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>