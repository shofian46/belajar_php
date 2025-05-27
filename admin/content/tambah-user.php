<?php
//jika user pencet tombol simpan
// ambil data dr inputan, email, nama, password
// masukan ke dlm tabel user (name, email, password), nilainya diambil dr masing" inputan

if (isset($_POST['simpan'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $role = $_POST['role'];
  $password = sha1($_POST['password']);

  $query = mysqli_query($conn, "INSERT INTO users (name, email, id_role, password) VALUES (null,'$name', '$email', '$role', '$password')");
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
  $role = $_POST['role'];
  $password = sha1($_POST['password']);

  $queryUpdate = mysqli_query($conn, "UPDATE users SET name = '$name', email = '$email', id_role='$role', password = '$password' WHERE user_id='$id_user'");
  if ($queryUpdate) {
    header('location:?page=user&edit=berhasil');
  }
}
$queryRole = mysqli_query($conn, "SELECT * FROM user_role");
$rowRole = mysqli_fetch_all($queryRole, MYSQLI_ASSOC);

$joinRole = mysqli_query($conn, "SELECT user_role.role, users.* FROM users LEFT JOIN user_role ON user_role.id=users.id_role WHERE user_id='$id_user'");
$rowJoinRole = mysqli_fetch_assoc($joinRole);
?>
<form action="" method="post">
  <div class="row mb-3">
    <div class="col-sm-2">
      <label for="">Nama* </label>
    </div>
    <div class="col-sm-10">
      <input type="text" name="name" id="name" class="form-control" value="<?= isset($_GET['edit']) ? ($rowJoinRole['name'] == $rowJoinRole['name']) ? $rowJoinRole['name'] : '' : ''; ?>" placeholder="Masukkan nama anda" required>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-2">
      <label for="">Email* </label>
    </div>
    <div class="col-sm-10">
      <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email anda" value="<?= isset($_GET['edit']) ? ($rowJoinRole['email'] == $rowJoinRole['email']) ? $rowJoinRole['email'] : '' : ''; ?>" required>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-2">
      <label for="">Role* </label>
    </div>
    <div class="col-sm-10">
      <select name="role" id="role" class="form-select" required>
        <option value="">Pilih Role</option>
        <?php foreach ($rowRole as $row): ?>
          <option value="<?= $row['id']; ?>" <?= isset($_GET['edit']) ? ($row['id'] == $rowJoinRole['id_role']) ? 'selected' : '' : ''; ?>><?= $rowJoinRole['role']; ?></option>
        <?php endforeach; ?>
      </select>
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
    <a class="btn btn-secondary rounded-pill" href="?page=user">Cancel</a>
    <button class="btn btn-primary rounded-pill" type="submit" name="<?= isset($id_user) ? 'edit' : 'tambah'; ?>"><?= $header; ?></button>
  </div>
</form>