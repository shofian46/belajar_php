<?php
$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryedit = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$id_user'");
$rowedit = mysqli_fetch_assoc($queryedit);

if (isset($_POST['simpan'])) {
  // print_r($_POST);
  // die;
  $name = $_POST['name'];
  $description = $_POST['description'];
  $tempat = $_POST['tempat'];
  $alamat = $_POST['alamat'];
  $tanggal = $_POST['dbo'];
  $zip_code = $_POST['zip_code'];
  $email = $_POST['email'];
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

    $inputQ = mysqli_query($conn, "INSERT INTO about (name, description, tempat, tanggal, alamat, zip_code, email, status, foto) VALUES ('$name','$description','$tempat', '$tanggal','$alamat','$zip_code','$email','$status','$filename')");
    if ($inputQ) {
      header("location:?page=about&tambah=berhasil");
    }
  }
}

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
          <input type="text" name="tempat" id="tempat" class="form-control" value="<?= !isset($row['description']) ? '' : $row['description']; ?>" required>
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
      <textarea name="alamat" id="summernote" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label for="form-label">Photo</label>
      <input type="file" name="photo" id="photo" class="form-control" required>
    </div>
    <div class="form-group row my-3">
      <div class="col-sm-2">
        <label for="">Status * </label>
      </div>
      <div class="col-sm-10">
        <input type="radio" name="status" value="1" checked> Publish
        <input type="radio" name="status" value="0"> Draft
      </div>
    </div>

    <div class="form-group">
      <img src="./assets/img/<?= $row['photo']; ?>" alt="" class="img-thumbnail mt-2" style="width: 200px; height: 200px;">
    </div>
    <?php
    if (empty($row['profile_name'])) { ?>
      <div class="d-grid gap-2 d-md-block my-2">
        <button class="btn btn-secondary rounded-pill" type="reset">Reset</button>
        <button class="btn btn-primary rounded-pill" type="submit" name="simpan"><?= $header; ?></button>
      </div>
    <?php } else { ?>
      <div class="d-grid gap-2 d-md-block my-2">
        <button type="submit" class="btn btn-primary rounded-pill" name="simpan">Simpan</button>
      </div>
    <?php } ?>
  </div>
</form>