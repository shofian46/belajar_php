<?php
$query = mysqli_query($conn, "SELECT * FROM resume ORDER BY id ASC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $queryDelete = mysqli_query($conn, "DELETE FROM resume WHERE id='$id'");
  header("location:?page=resume&hapus=berhasil");
}
?>
<div class="table-responsive">
  <div align="right" class="mb-3">
    <a href="?page=tambah-resume" class="btn btn-primary rounded-pill">Add Resume</a>
  </div>
  <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>No</th>
        <th>Title</th>
        <th>Subtitle</th>
        <th>Description</th>
        <th>Content</th>
        <th>Year</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      foreach ($row as $key => $data): ?>
        <tr>
          <!-- <td><?= $i++ ?></td> -->
          <td><?= $key + 1 ?></td>
          <td><?= $data['title'] ?></td>
          <td><?= $data['subtitle'] ?></td>
          <td><?= $data['deskripsi'] ?></td>
          <td><?= $data['content'] ?></td>
          <td><?= date('Y', strtotime($data['year_start'])) . ' - ' . date('Y', strtotime($data['year_end'])) ?></td>
          <td>
            <a href="?page=tambah-resume&edit=<?= $data['id'] ?>" class="btn btn-primary btn-sm d-flex justify-content-center align-items-center mb-3">Ubah</a>
            <a href="?page=resume&delete=<?= $data['id'] ?>" class="btn btn-danger btn-sm d-flex justify-content-center align-items-center"
              onclick="return confirm('Are you sure you want to delete this message?')">Delete</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>