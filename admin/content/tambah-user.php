<?php
//jika user pencet tombol simpan
// ambil data dr inputan, email, nama, password
// masukan ke dlm tabel user (name, email, password), nilainya diambil dr masing" inputan

if (isset($_POST['simpan'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = sha1($_POST['password']);

  $query = mysqli_query($conn, "INSERT INTO users (name, email, password) VALUES (null,'$name', '$email', '$password')");
  if ($query) {
    header('dashboard.php?page=user&tambah=berhasil');
  }
}

$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryedit = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$id_user'");
$rowedit = mysqli_fetch_assoc($queryedit);

if (isset($_POST['edit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = sha1($_POST['password']);

  $queryUpdate = mysqli_query($conn, "UPDATE users SET name = '$name', email = '$email', password = '$password' WHERE user_id='$id_user'");
  if ($queryUpdate) {
    header('location:dashboard.php?page=user&edit=berhasil');
  }
}
?>
<form action="" method="post">
  <div class="row mb-3">
    <div class="col-sm-2">
      <label for="">Nama* </label>
    </div>
    <div class="col-sm-10">
      <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama anda" required>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-2">
      <label for="">Email* </label>
    </div>
    <div class="col-sm-10">
      <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email anda" required>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-2">
      <label for="">Password* </label>
    </div>
    <div class="col-sm-10">
      <input type="password" name="password" id="password" class="form-control"
        placeholder="Masukkan password anda" required>
    </div>
  </div>
  <div class="d-grid gap-2 d-md-block my-2">
    <button class="btn btn-secondary rounded-pill" type="reset">Cancel</button>
    <button class="btn btn-primary rounded-pill" type="submit" name="<?= isset($id_user) ? 'edit' : 'tambah'; ?>"><?= $header; ?></button>
  </div>
</form>