<?php
$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryedit = mysqli_query($conn, "SELECT * FROM resume WHERE id='$id_user'");
$rowedit = mysqli_fetch_assoc($queryedit);

if (isset($_POST['simpan'])) {
  $title = $_POST['title'];
  $subtitle = $_POST['subtitle'];
  $desc = $_POST['desc'];
  $content = $_POST['content'];
  $tahun1 = $_POST['tahun1'];
  $tahun2 = $_POST['tahun2'];

  $inputQ = mysqli_query($conn, "INSERT INTO resume (year_start,year_end,title,subtitle,deskripsi,content) VALUES ('$year_start','$year_end','$title','$subtitle','$desc','$content')");
  if ($inputQ) {
    header("location:?page=resume&tambah=berhasil");
  }
}

if (isset($_POST['edit'])) {
  $title = $_POST['title'];
  $subtitle = $_POST['subtitle'];
  $desc = $_POST['desc'];
  $content = $_POST['content'];
  $tahun1 = $_POST['tahun1'];
  $tahun2 = $_POST['tahun2'];

  // $inputQ = mysqli_query($conn, "UPDATE INTO resume (year_start,year_end,title,subtitle,deskripsi,content) VALUES ('$year_start','$year_end','$title','$subtitle','$desc','$content')");
  $queryUpdate = mysqli_query($conn, "UPDATE resume SET year_start='$tahun1', year_end='$tahun2', title='$title', deskripsi='$desc', content='$content' WHERE id='$id_user'");
  if ($queryUpdate) {
    header("location:?page=resume&ubah=berhasil");
  }
}
// }

?>
<form action="" method="post">
  <div class="m-2">
    <div class="form-group">
      <label class="form-label" for="name">Title</label>
      <input type="text" name="title" id="title" class="form-control" value="<?= isset($_GET['edit']) ? ($rowedit['title'] == $rowedit['title']) ? $rowedit['title'] : '' : ''; ?>" required>
    </div>
    <div class="form-group">
      <label class="form-label" for="subtitle">Subtitle</label>
      <textarea name="subtitle" id="subtitle" class="form-control"><?= isset($_GET['edit']) ? ($rowedit['subtitle'] == $rowedit['subtitle']) ? $rowedit['subtitle'] : '' : ''; ?></textarea>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="form-label">Deskripsi</label>
          <textarea name="desc" id="desc" class="form-control" required><?= isset($_GET['edit']) ? ($rowedit['deskripsi'] == $rowedit['deskripsi']) ? $rowedit['deskripsi'] : '' : ''; ?></textarea>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="form-label">Content</label>
      <textarea name="content" id="summernote" class="form-control" required><?= isset($_GET['edit']) ? ($rowedit['content'] == $rowedit['content']) ? $rowedit['content'] : '' : ''; ?></textarea>
    </div>
    <div class="row my-3">
      <div class="col">
        <div class="form-group">
          <label for="form-label">Year Start</label>
          <input type="date" name="tahun1" id="tahun1" class="form-control" value="<?= isset($_GET['edit']) ? ($rowedit['year_start'] == $rowedit['year_start']) ? $rowedit['year_start'] : '' : ''; ?>" required></input>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="form-label">Year End</label>
          <input type="date" name="tahun2" id="tahun2" class="form-control" value="<?= isset($_GET['edit']) ? ($rowedit['year_end'] == $rowedit['year_end']) ? $rowedit['year_end'] : '' : ''; ?>" required></input>
        </div>
      </div>
    </div>
    <div class="d-grid gap-2 d-md-block my-2">
      <button class="btn btn-secondary rounded-pill" type="reset">Reset</button>
      <button class="btn btn-primary rounded-pill" type="submit" name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>"><?= $header; ?></button>
    </div>
  </div>
</form>