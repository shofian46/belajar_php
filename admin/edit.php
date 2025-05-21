<?php
include 'config/koneksi.php';

$id = $_GET["edit"];
$data = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$id'");
$row = mysqli_fetch_assoc($data);


if (isset($_POST["edit"])) {
  if (ubah($_POST) > 0) {
    echo "<script>
				alert('data berhasil diubah!');
				document.location.href = 'user.php';
			  </script>";
  } else {
    echo "<script>
				alert('data gagal diubah!');
				document.location.href = 'user.php';
			  </script>";
  }
}

$header = isset($_GET['edit']) ? 'Edit' : 'Tambah';
$id_user = isset($_GET['edit']) ? $_GET['edit'] : null;


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form tambah</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="wrapper">

    <?php include 'inc/header.php' ?>

    <div class="content mt-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <?= $header; ?> Data User
              </div>
              <div class="card-body">
                <form action="" method="post">
                  <input type="hidden" name="id" value="<?= $row["user_id"]; ?>">
                  <div class="row mb-3">
                    <div class="col-sm-2">
                      <label for="">Nama* </label>
                    </div>
                    <div class="col-sm-10">
                      <input type="text" name="name" id="name" class="form-control" value="<?= $row['name']; ?>" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-2">
                      <label for="">Email* </label>
                    </div>
                    <div class="col-sm-10">
                      <input type="email" name="email" id="email" class="form-control" value="<?= $row['email']; ?>" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-2">
                      <label for="">Password </label>
                    </div>
                    <div class="col-sm-10">
                      <input type="password" name="password" id="password" class="form-control"
                        placeholder="Masukkan password anda">
                    </div>
                  </div>
                  <div class="d-grid gap-2 d-md-block my-2">
                    <button class="btn btn-secondary rounded-pill" type="reset">Cancel</button>
                    <button class="btn btn-primary rounded-pill" type="submit" name="<?= isset($id_user) ? 'edit' : 'tambah'; ?>"><?= $header; ?></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>