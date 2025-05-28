<?php
$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$query = mysqli_query($conn, "SELECT * FROM service ORDER BY id ASC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $queryDelete = mysqli_query($conn, "DELETE FROM service WHERE id='$id'");
  header("location:?page=resume&hapus=berhasil");
}
?>
<div class="table-responsive">
  <div align="right" class="mb-3">
    <a href="?page=tambah-service" class="btn btn-primary rounded-pill">Add Service</a>
  </div>
  <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>No</th>
        <th>Service</th>
        <th>Icon</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      foreach ($row as $key => $data): ?>
        <tr>
          <!-- <td><?= $i++ ?></td> -->
          <td><?= $key + 1 ?></td>
          <td><?= $data['servis'] ?></td>
          <td><?= $data['icon'] ?></td>
          <td>
            <a href="?page=tambah-service&edit=<?= $data['id'] ?>" class="btn btn-primary btn-sm d-flex justify-content-center align-items-center mb-3">Ubah</a>
            <a href="?page=service&delete=<?= $data['id'] ?>" class="btn btn-danger btn-sm d-flex justify-content-center align-items-center"
              onclick="return confirm('Are you sure you want to delete this message?')">Delete</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>