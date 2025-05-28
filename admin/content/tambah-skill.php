<?php
//jika user pencet tombol simpan
// ambil data dr inputan, email, nama, password
// masukan ke dlm tabel user (name, email, password), nilainya diambil dr masing" inputan

if (isset($_POST['simpan'])) {
  $nama_skill = $_POST['nama_skill'];
  $nilai = $_POST['nilai'];

  $queryAdd = mysqli_query($conn, "INSERT INTO skill (nama_skill, nilai) VALUES ('$nama_skill', '$nilai')");
  if ($queryAdd) {
    header('?page=skill&tambah=berhasil');
  }
}

$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? isset($_GET['edit']) : '';
$querySkill = mysqli_query($conn, "SELECT * FROM skill ORDER BY id ASC");
$rowedit = mysqli_fetch_all($querySkill, MYSQLI_ASSOC);


if (isset($_POST['edit'])) {
  $nama_skill = $_POST['nama_skill'];
  $nilai = $_POST['nilai'];
  $queryUpdate = mysqli_query($conn, "UPDATE skill SET nama_skill = '$nama_skill', nilai = '$nilai', WHERE id='$id_user'");
  if ($queryUpdate) {
    header('location:?page=skill&edit=berhasil');
  }
}
$querySkill = mysqli_query($conn, "SELECT * FROM skill");
$rowSkill = mysqli_fetch_assoc($querySkill);
?>
<form action="" method="post">
  <div class="row mb-3">
    <div class="col-sm-2">
      <label for="">Skill* </label>
    </div>
    <div class="col-sm-10">
      <input type="text" name="nama_skill" id="nama_skill" class="form-control" value="<?= isset($_GET['edit']) ? ($rowedit['nama_skill'] == $rowedit['nama_skill']) ? $rowedit['nama_skill'] : '' : ''; ?>" placeholder="Masukkan skill anda" required>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-2">
      <label for="">Nilai* </label>
    </div>
    <div class="col-sm-10">
      <input type="number" name="nilai" id="nilai" class="form-control" value="<?= isset($_GET['edit']) ? ($rowedit['nilai'] == $rowedit['nilai']) ? $rowedit['nilai'] : '' : ''; ?>" required>
    </div>
  </div>
  <div class="d-grid gap-2 d-md-block my-2">
    <a class="btn btn-secondary rounded-pill" href="?page=skill">Cancel</a>
    <button class="btn btn-primary rounded-pill" type="submit" name="<?= (!isset($id_user) ? 'edit' : 'simpan'); ?>"><?= $header; ?></button>
  </div>
</form>