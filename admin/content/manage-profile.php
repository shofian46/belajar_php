<?php
if (isset($_POST['simpan'])) {
  $nm_profile = $_POST['profile_name'];
  $profession = $_POST['profesion'];
  $description = $_POST['description'];
  $photo = $_FILES['photo']['name'];

  $queryProfile = mysqli_query($conn, "SELECT * FROM profiles ORDER BY id_profile DESC");
  if (mysqli_num_rows($queryProfile) > 0) {
    //  perintah update
  } else {
    // perintah insert
    if (!empty($photo)) {
      // jika ada foto
    } else {
      // jika tidak ada foto
      $inputQ = mysqli_query($conn, "INSERT INTO profiles (profile_name, profesion, description) VALUES ('$nm_profile','$profession','$description')");
      header('location:?page=manage-profile&tambah=success');
    }
  }
  // if ($photo['error'] == 0) {
  //   $filename = uniqid() . '_' . basename($photo['name']);
  //   $filepath = 'assets/img/' . $filename;
  //   move_uploaded_file($photo['tmp_name'], $filepath);
  // }

  if ($inputQ) {
    // header('location:dashboard.php?level=' . base64_encode($_SESSION['LEVEL']) . '&page=manage-profile');
  }
}


// if (isset($_GET['del'])) {
//   $idhapus = $_GET['del'];

//   $pilihphoto = mysqli_query($conn, "SELECT photo FROM profiles WHERE id_profile= $idhapus");
//   $rowphoto = mysqli_fetch_assoc($pilihphoto);
//   if (isset($rowphoto['photo'])) {
//     unlink('assets/img/' . $rowphoto['photo']);
//   }

// if ($rowphoto && !empty($rowphoto['photo'])) {
//   $filepath = 'uploads/' . $rowphoto['photo'];
//   if (file_exists($filepath) && is_file($filepath)) {
//     unlink($filepath);
//   }
// }

// $delete = mysqli_query($conn, "DELETE FROM profiles WHERE id_profile=$idhapus");
// if ($delete) {
// header('location:dashboard.php?level=' . base64_encode($_SESSION['LEVEL']));
// }

// }
$pilihprofile = mysqli_query($conn, "SELECT * FROM profiles");
$row = mysqli_fetch_assoc($pilihprofile);
?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="m-2">
    <div class="form-group mb-2">
      <label for="form-label">Profile Name</label>
      <input type="text" name="profile_name" id="profile_name" class="form-control" value="<?= !isset($row['profile_name']) ? '' : $row['profile_name']; ?>" required>
    </div>
    <div class="form-group mb-2">
      <label for="form-label">Profesion</label>
      <input type="text" name="profesion" id="profesion" class="form-control" value="<?= !isset($row['profesion']) ? '' : $row['profesion']; ?>" required>
    </div>
    <div class="form-group mb-2">
      <label for="form-label">Description</label>
      <textarea name="description" id="description" class="form-control"></textarea>
    </div>
    <div style="width:55%">
      <label for="form-label">Photo</label>
      <input type="file" name="photo" id="photo" class="form-control">
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