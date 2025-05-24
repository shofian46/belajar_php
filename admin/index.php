<?php
session_start();
include 'config/koneksi.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email'];
  $password = sha1($_POST['password']);

  // Check if the email and password are empty

  $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
  // Check if the user exists
  if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    // Check if the password is correct
    $_SESSION['name'] = $row['name'];
    $_SESSION['uuid'] = $row['id'];
    $_SESSION['role'] = $row['id_role'];
    header('Location: dashboard.php');
  } else {
    // Redirect to the login page with an error message
    header('Location: index.php?login=failed');
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman SignIn</title>

  <!--==================== FavIcon ====================-->
  <link rel="shortcut icon" href="http://localhost/angkatan2_2025_fikri/belajar_php/admin/assets/img/favicon.png" type="image/x-icon">

  <!--==================== BootstrapCSS ====================-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!--=============== REMIXICONS ===============-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">

  <!--==================== CSS ====================-->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <div class="container mb-5">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5 px-4">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <!--=============== LOGIN ===============-->
                <div class="login container grid" id="loginAccessRegister">
                  <!--===== LOGIN ACCESS =====-->
                  <div class="login__access">
                    <h5 class="login__title">Masuk</h5>
                    <?php if (isset($_GET['access'])) : ?>
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Upps!</strong> Anda harus signin terlebih dahulu!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif; ?>
                    <?php if (isset($_GET['login'])) : ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Mohon periksa kembali email dan password anda!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif; ?>
                    <?php if (isset($_GET['logout'])) : ?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Anda Telah Keluar Dari Aplikasi!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif; ?>
                    <div class="login__area">
                      <form action="" method="post" class="login__form">
                        <div class="login__content grid">
                          <div class="login__box">
                            <input type="email" id="email" name="email" required placeholder=" " class="login__input">
                            <label for="email" class="login__label">Email</label>

                            <i class="ri-mail-fill login__icon"></i>
                          </div>

                          <div class="login__box">
                            <input type="password" id="password" name="password" required placeholder=" " class="login__input">
                            <label for="password" class="login__label">Password</label>

                            <i class="ri-eye-off-fill login__icon login__password" id="loginPassword"></i>
                          </div>
                        </div>

                        <a href="#" class="login__forgot">Forgot your password?</a>

                        <button type="submit" class="login__button">Login</button>
                      </form>

                      <p class="login__switch">
                        Belum punya akun?
                        <button id="loginButtonRegister">Buat</button>
                      </p>
                    </div>
                  </div>

                  <!--===== LOGIN REGISTER =====-->
                  <div class="login__register">
                    <h5 class="login__title">Pembuatan akun baru</h5>

                    <div class="login__area">
                      <form action="" class="login__form">
                        <div class="login__content grid">
                          <div class="login__group grid">
                            <div class="login__box">
                              <input type="text" id="surnames" required placeholder=" " class="login__input">
                              <label for="surnames" class="login__label">Username</label>

                              <i class="ri-id-card-fill login__icon"></i>
                            </div>
                          </div>

                          <div class="login__box">
                            <input type="email" id="emailCreate" required placeholder=" " class="login__input">
                            <label for="emailCreate" class="login__label">Email</label>

                            <i class="ri-mail-fill login__icon"></i>
                          </div>

                          <div class="login__box">
                            <input type="password" id="passwordCreate" required placeholder=" " class="login__input">
                            <label for="passwordCreate" class="login__label">Password</label>

                            <i class="ri-eye-off-fill login__icon login__password" id="loginPasswordCreate"></i>
                          </div>
                        </div>

                        <button type="submit" class="login__button">Create account</button>
                      </form>

                      <p class="login__switch">
                        Sudah mempunyai akun?
                        <button id="loginButtonAccess">Masuk</button>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
  <!--==================== FOOTER ====================-->
  <footer style="min-height: 60px;" class="bg-success fixed-bottom">
    <div class="row text-light">
      <div class="col d-flex justify-content-start">
        <p class="ms-5 pt-3">Copyright &copy; 2025 Shofian Al Fikri.</p>
      </div>
      <div class="col d-flex justify-content-end">
        <p class="pe-5 pt-3">Privacy Policy</p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>