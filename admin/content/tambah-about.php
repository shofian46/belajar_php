<?php
$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryedit = mysqli_query($conn, "SELECT * FROM about WHERE id='$id_user'");
$rowedit = mysqli_fetch_assoc($queryedit);

if (isset($_POST['simpan'])) {
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

    $inputQ = mysqli_query($conn, "INSERT INTO about (name, description, tempat, tanggal, alamat, zip_code, email, phone, status, foto) VALUES ('$name','$description','$tempat', '$tanggal','$alamat','$zip_code','$email','$phone','$status','$filename')");
    if ($inputQ) {
      header("location:?page=about&tambah=berhasil");
    }
  }
}

if (isset($_POST['edit'])) {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $tempat = $_POST['tempat'];
  $alamat = $_POST['alamat'];
  $tanggal = $_POST['dbo'];
  $zip_code = $_POST['zip_code'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $status = $_POST['status'];

  if ($_FILES['photo']['name'] != '') {
    $photo = $_FILES['photo']['name'];
    $extension = ['png', 'jpg', 'jpeg', 'gif'];
    $ext = pathinfo($photo, PATHINFO_EXTENSION);

    if (!in_array($ext, $extension)) {
      echo "<script>alert('Ekstensi file tidak diizinkan!');</script>";
    } else {
      unlink('assets/img/' . $rowedit['foto']);
      $filename = uniqid() . '_' . basename($photo);
      move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/img/' . $filename);
      $queryUpdate = mysqli_query($conn, "UPDATE about SET name='$name', description='$description', tempat='$tempat', tanggal='$tanggal', alamat='$alamat', zip_code='$zip_code', email='$email', phone='$phone', status='$status', foto='$filename' WHERE id='$id_user'");
    }
  } else {
    // Jika tidak ada foto yang diupload, tetap update data lainnya
    $queryUpdate = mysqli_query($conn, "UPDATE about SET name='$name', description='$description', tempat='$tempat', tanggal='$tanggal', alamat='$alamat', zip_code='$zip_code', email='$email', phone='$phone', status='$status' WHERE id='$id_user'");
  }

  if ($queryUpdate) {
    header('location:?page=about&edit=berhasil');
  }
}

?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="m-2">
    <div class="form-group">
      <label class="form-label" for="name">Name</label>
      <input type="text" name="name" id="name" class="form-control" value="<?= isset($_GET['edit']) ? ($rowedit['name'] == $rowedit['name']) ? $rowedit['name'] : '' : ''; ?>" required>
    </div>
    <div class="form-group">
      <label class="form-label" for="description">Description</label>
      <textarea name="description" id="description" class="form-control"><?= isset($_GET['edit']) ? ($rowedit['description'] == $rowedit['description']) ? $rowedit['description'] : '' : ''; ?></textarea>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="form-label">Tempat</label>
          <input type="text" name="tempat" id="tempat" class="form-control" value="<?= isset($_GET['edit']) ? ($rowedit['tempat'] == $rowedit['tempat']) ? $rowedit['tempat'] : '' : ''; ?>" required>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="form-label">Tanggal</label>
          <input type="date" name="dbo" id="dbo" class="form-control" value="<?= isset($_GET['edit']) ? ($rowedit['tanggal'] == $rowedit['tanggal']) ? $rowedit['tanggal'] : '' : ''; ?>" required>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="form-label">Zip Code</label>
          <input type="number" name="zip_code" id="zip_code" class="form-control" value="<?= isset($_GET['edit']) ? ($rowedit['zip_code'] == $rowedit['zip_code']) ? $rowedit['zip_code'] : '' : ''; ?>" required>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="form-label">Email</label>
      <input type="email" name="email" id="email" class="form-control" value="<?= isset($_GET['edit']) ? ($rowedit['email'] == $rowedit['email']) ? $rowedit['email'] : '' : ''; ?>" required>
    </div>
    <div class="form-group">
      <label for="form-label">Phone</label>
      <input type="number" name="phone" id="phone" class="form-control" value="<?= isset($_GET['edit']) ? ($rowedit['phone'] == $rowedit['phone']) ? $rowedit['phone'] : '' : ''; ?>" required>
    </div>
    <div class="form-group">
      <label for="form-label">Alamat</label>
      <textarea name="alamat" id="summernote" class="form-control"><?= isset($_GET['edit']) ? ($rowedit['alamat'] == $rowedit['alamat']) ? $rowedit['alamat'] : '' : ''; ?></textarea>
    </div>
    <div class="form-group">
      <label for="form-label">Photo</label>
      <input type="file" name="photo" id="photo" class="form-control">
    </div>
    <div class="form-group row my-3">
      <div class="col-sm-2">
        <label for="">Status * </label>
      </div>
      <div class="col-sm-10">
        <input type="radio" name="status" value="1" <?= isset($_GET['edit']) ? $rowedit['status'] == $rowedit['status'] ? 'checked' : "" : "" ?>> Publish
        <input type="radio" name="status" value="0" <?= isset($_GET['edit']) ? $rowedit['status'] == 0 ? 'checked' : "" : "" ?>> Draft
      </div>
    </div>

    <div class="form-group">
      <img src="./assets/img/<?= isset($_GET['edit']) ? ($rowedit['foto'] == $rowedit['foto']) ? $rowedit['foto'] : '' : ''; ?>" alt="" class="img-thumbnail mt-2" style="width: 200px; height: 200px;">
    </div>
    <div class="d-grid gap-2 d-md-block my-2">
      <button class="btn btn-secondary rounded-pill" type="reset">Reset</button>
      <button class="btn btn-primary rounded-pill" type="submit" name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>"><?= $header; ?></button>
    </div>
  </div>
</form>