<?php
//jika user pencet tombol simpan
// ambil data dr inputan, email, nama, password
// masukan ke dlm tabel user (name, email, password), nilainya diambil dr masing" inputan

if (isset($_POST['simpan'])) {
  $service = $_POST['service'];
  $icon = $_POST['icon'];

  $query = mysqli_query($conn, "INSERT INTO service (servis, icon) VALUES ('$service', '$icon')");
  if ($query) {
    header('?page=service&tambah=berhasil');
  }
}

$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? isset($_GET['edit']) : '';
$queryedit = mysqli_query($conn, "SELECT * FROM service WHERE id='$id_user'");

$rowedit = mysqli_fetch_assoc($queryedit);

if (isset($_POST['edit'])) {
  $service = $_POST['service'];
  $icon = $_POST['icon'];
  $queryUpdate = mysqli_query($conn, "UPDATE service SET servis = '$service', icon = '$icon', WHERE id='$id_user'");
  if ($queryUpdate) {
    header('location:?page=service&edit=berhasil');
  }
}
$queryService = mysqli_query($conn, "SELECT * FROM service");
$rowService = mysqli_fetch_assoc($queryService);
?>
<form action="" method="post">
  <div class="row mb-3">
    <div class="col-sm-2">
      <label for="">Servis* </label>
    </div>
    <div class="col-sm-10">
      <input type="text" name="service" id="service" class="form-control" value="<?= isset($_GET['edit']) ? ($rowService['servis'] == $rowService['servis']) ? $rowService['servis'] : '' : ''; ?>" placeholder="Masukkan servis anda" required>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-2">
      <label for="">Icon* </label>
    </div>
    <div class="col-sm-10">
      <input type="text" name="icon" id="icon" class="form-control" value="<?= isset($_GET['edit']) ? ($rowService['icon'] == $rowService['icon']) ? $rowService['icon'] : '' : ''; ?>" required>
    </div>
  </div>
  <div class="d-grid gap-2 d-md-block my-2">
    <a class="btn btn-secondary rounded-pill" href="?page=service">Cancel</a>
    <button class="btn btn-primary rounded-pill" type="submit" name="<?= (!isset($id_user) ? 'edit' : 'simpan'); ?>"><?= $header; ?></button>
  </div>
</form>