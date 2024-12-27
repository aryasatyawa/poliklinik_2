<?php
if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = $mysqli->query($query);

    if (!$result) {
        die("Query error: " . $mysqli->error);
    }

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $row['fullname'];
            header("Location: index.php");
        } else {
            $error = "Password salah";
        }
    } else {
        $error = "User tidak ditemukan";
    }
}
?>

<div class="container" style="margin-top: 10rem;">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg rounded">
                <div class="card-body">
                    <div class="text-center">
                        <h2 class="mb-4" style="font-weight: bold; color: #007bff;">Login</h2>
                    </div>
                    <form method="POST" action="index.php?page=loginUser">
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
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" required placeholder="Masukkan username Anda" style="border-radius: 25px;">
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
                        <p class="mb-1">Belum punya akun? <a href="index.php?page=registerUser" style="color: #007bff; text-decoration: none;">Daftar</a></p>
                        <p class="mt-1">Login sebagai dokter? <a href="index.php?page=loginDokter" style="color: #007bff; text-decoration: none;">Saya Dokter</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>