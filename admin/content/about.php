<?php
$query = mysqli_query($conn, "SELECT * FROM about ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $queryDelete = mysqli_query($conn, "DELETE FROM about WHERE id='$id'");
  header("location:?page=about&hapus=berhasil");
}
?>
<div class="table-responsive">
  <div align="right" class="mb-3">
    <a href="?page=tambah-about" class="btn btn-primary">Add</a>
  </div>
  <table class="table table-bordered" id="dataTable">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      foreach ($row as $key => $datas): ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= $datas['name']; ?></td>
          <td><?= $datas['email']; ?></td>
          <td>
            <?= $datas['status'] == 1 ? '<span class="badge rounded-pill bg-primary">Publish</span>' : '<span class="badge rounded-pill bg-danger">Draf</span>'; ?></td>
          <td>
            <a href="?page=tambah-about&edit=<?php echo $datas['id'] ?>" class="btn btn-success btn-sm">Edit</a>
            <a onclick="return confirm('Are you sure?')" href="?page=about&delete=<?= $datas['id']; ?>"
              class="btn btn-danger btn-sm">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>