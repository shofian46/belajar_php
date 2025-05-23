<?php
if (isset($_POST['simpan'])) {
  $profile_name = htmlspecialchars($_POST['profile_name']);
  $profesion = htmlspecialchars($_POST['profesion']);
  $description = htmlspecialchars($_POST['description']);
  $photo = $_FILES['photo'];
  if ($photo['error'] === 0) {
    $fileName = uniqid() . '-' . basename($photo['name']);
    $filePath = 'assets/img/' . $fileName;
    move_uploaded_file($photo['tmp_name'], $filePath);
    $insertQ = mysqli_query($conn, "INSERT INTO profiles (profile_name, profesion, description, photo) VALUES ('$profile_name', '$profesion', '$description', '$fileName')");
  }
  if ($insertQ) {
    header('location:dashboard.php?role=' . base64_encode($_SESSION['role']) . '&page=manage-profile');
  }
}

$selectProfile = mysqli_query($conn, "SELECT * FROM profiles");
$row = mysqli_fetch_assoc($selectProfile);

if (isset($_GET['del'])) {
  $id = $_GET['del'];
  $selectPhoto = mysqli_query($conn, "SELECT photo FROM profiles WHERE id_profile = $id");
  $rowPhoto = mysqli_fetch_assoc($selectPhoto);
  if (isset($rowPhoto['photo'])) {
    unlink("assets/img/" .  $row['photo']);
  }
  $Qdelete = mysqli_query($conn, "DELETE FROM profiles WHERE id_profile='$id'");


  if ($Qdelete) {
    header('location:dashboard.php?role=' . base64_encode($_SESSION['role']) . '&page=manage-profile');
  }
}
?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="m-2">
    <label for="form-label">Profile Name</label>
    <input type="text" name="profile_name" id="profile_name" class="form-control" value="<?= !isset($row['profile_name']) ? '' : $row['profile_name']; ?>" required>

    <label for="form-label">Profesion</label>
    <input type="text" name="profesion" id="profesion" class="form-control" value="<?= !isset($row['profesion']) ? '' : $row['profesion']; ?>" required>

    <label for="form-label">Description</label>
    <input type="text" name="description" id="description" class="form-control" value="<?= !isset($row['description']) ? '' : $row['description']; ?>" required>
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
        <a onclick="return confirm('Yakin ingin menghapus data ini?')" href="?role=<?= base64_encode($_SESSION['role']); ?>&page=manage-profile&del=<?= $row['id_profile']; ?>" class="btn btn-danger rounded-pill" name="del">Delete</a>
      </div>
    <?php } ?>
  </div>
</form>