<?php
if (isset($_POST['simpan'])) {
  print_r($_POST);
  die;
  $name = $_POST['name'];
  $description = $_POST['description'];
  $tempat = $_POST['tempat'];
  $alamat = $_POST['alamat'];
  $tanggal = $_POST['dbo'];
  $zip_code = $_POST['zip_code'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $status = $_POST['status'];
  $photo = $_FILES['photo']['name'];
  $size = $_FILES['photo']['name'];

  $extension = ['png', 'jpg', 'jpeg', 'gif'];
  $ext = pathinfo($photo, PATHINFO_EXTENSION);

  if (!in_array($ext, $extension)) {
    echo "<script>alert('Ekstensi file tidak diizinkan!');</script>";
  } else {
    $filename = uniqid() . '_' . basename($photo);
    $filepath = 'assets/img/' . $filename;
    move_uploaded_file($_FILES['photo']['tmp_name'], $filepath);

    $inputQ = mysqli_query($conn, "INSERT INTO about (name, description, tempat, tanggal, alamat, zip_code, email, phone, photo) VALUES ('$name','$description','$tempat', '$tanggal','$alamat','$zip_code','$email','$phone','$filename')");
    if ($inputQ) {
      header('location:?page=tambah=berhasil');
    }
  }

  /* if ($photo['error'] == 0) {
    $filename = uniqid() . '_' . basename($photo['name']);
    $filepath = 'assets/img/' . $filename;
    move_uploaded_file($photo['tmp_name'], $filepath);

    $inputQ = mysqli_query($conn, "INSERT INTO about (profile_name, profesion, description, photo) VALUES ('$nm_profile','$profession','$description','$filename')");
  }

  if ($inputQ) {
    // header('location:dashboard.php?level=' . base64_encode($_SESSION['LEVEL']) . '&page=manage-profile');
  } */
}


if (isset($_GET['del'])) {
  $idhapus = $_GET['del'];

  $pilihphoto = mysqli_query($conn, "SELECT photo FROM profiles WHERE id_profile= $idhapus");
  $rowphoto = mysqli_fetch_assoc($pilihphoto);
  if (isset($rowphoto['photo'])) {
    unlink('assets/img/' . $rowphoto['photo']);
  }

  // if ($rowphoto && !empty($rowphoto['photo'])) {
  //   $filepath = 'uploads/' . $rowphoto['photo'];
  //   if (file_exists($filepath) && is_file($filepath)) {
  //     unlink($filepath);
  //   }
  // }

  $delete = mysqli_query($conn, "DELETE FROM profiles WHERE id_profile=$idhapus");
  if ($delete) {
    // header('location:dashboard.php?level=' . base64_encode($_SESSION['LEVEL']));
  }
}
$pilihprofile = mysqli_query($conn, "SELECT * FROM profiles");
$row = mysqli_fetch_assoc($pilihprofile);
?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="m-2">
    <div class="form-group">
      <label class="form-label" for="name">Name</label>
      <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
      <label class="form-label" for="description">Description</label>
      <textarea name="description" id="description" class="form-control"></textarea>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="form-label">Tempat</label>
          <input type="text" name="location" id="location" class="form-control" value="<?= !isset($row['description']) ? '' : $row['description']; ?>" required>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="form-label">Tanggal</label>
          <input type="date" name="dbo" id="dbo" class="form-control" required>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="form-label">Zip Code</label>
          <input type="number" name="zip_code" id="zip_code" class="form-control" required>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="form-label">Email</label>
      <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="form-label">Alamat</label>
      <textarea name="alamat" id="alamat" class="form-control"></textarea>
    </div>
    <div style="width:55%">
      <label for="form-label">Photo</label>
      <input type="file" name="photo" id="photo" class="form-control" required>
    </div>
    <div class="form-group">
      <img src="./assets/img/<?= $row['photo']; ?>" alt="" class="img-thumbnail mt-2" style="width: 200px; height: 200px;">
    </div>
    <?php
    if (empty($row['profile_name'])) { ?>
      <div class="d-grid gap-2 d-md-block my-2">
        <button class="btn btn-secondary rounded-pill" type="reset">Reset</button>
        <button class="btn btn-primary rounded-pill" type="submit" name="simpan">Simpan</button>
      </div>
    <?php } else { ?>
      <div class="d-grid gap-2 d-md-block my-2">
        <a onclick="return confirm('Yakin ingin menghapus data ini?')" href="?page=manage-profile&del=<?= $row['id_profile']; ?>" class="btn btn-danger rounded-pill" name="del">Delete</a>
      </div>
    <?php } ?>
  </div>
</form>