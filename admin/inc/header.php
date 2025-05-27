<?php
$role_id = isset($_SESSION['role']) ? $_SESSION['role'] : '';
?>
<header class="shadow-sm">
  <nav class="navbar navbar-expand-lg bg-body-white">
    <div class="container">
      <a class="navbar-brand" href="dashboard.php">CMS Admin</a>
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
              <li><a class="dropdown-item" href="?page=about">About Me</a></li>
              <li><a class="dropdown-item" href="?page=contact">Contact</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
            </ul>
          </li>
          <?php
          if ($role_id == '1') {
            echo '<li class="nav-item">
                    <a class="nav-link" href="?page=user">User</a>
                  </li>';
          }
          ?>
          <li class="nav-item">
            <a class="nav-link" href="?page=manage-profile">Profile</a>
          </li>
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