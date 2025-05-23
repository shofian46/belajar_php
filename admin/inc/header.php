<?php session_start();
$_name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
if (!$_name) {
  header('Location: index.php?access=failed');
  exit();
}
?>
<header class="shadow-sm">
  <nav class="navbar navbar-expand-lg bg-body-white">
    <div class="container">
      <a class="navbar-brand" href="dashboard.php?role=<?= $_SESSION['role']; ?>">Admin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Page
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <?php
          $decrypt = base64_decode($_GET['role']);
          if (isset($_GET['role']) && $decrypt == 1) { ?>
            <li class="nav-item">
              <a class="nav-link" href="user.php?role=<?= base64_encode($_SESSION['role']) ?>">User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php?role=<?= base64_encode($_SESSION['role']) ?>&page=manage-profile">Profile</a>
            </li>
          <?php } ?>

        </ul>

        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              <?= $_name; ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="signout.php">Sign out</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>