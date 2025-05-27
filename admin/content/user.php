<?php
$query = mysqli_query($conn, "SELECT user_role.role, users.* FROM users LEFT JOIN user_role ON user_role.id=users.id_role ORDER BY user_id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $queryDelete = mysqli_query($conn, "DELETE FROM users WHERE user_id='$id'");
  header("location:?page=user&hapus=berhasil");
}
?>
<div class="table-responsive">
  <div align="right" class="mb-3">
    <a href="?page=tambah-user" class="btn btn-primary">Add</a>
  </div>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
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
          <td><?= $datas['role']; ?></td>
          <td>
            <a href="?page=tambah-user&edit=<?php echo $datas['user_id'] ?>" class="btn btn-success btn-sm">Edit</a>
            <a onclick="return confirm('Are you sure??')"
              href="?page=user&delete=<?php echo $datas['user_id'] ?>" class="btn btn-warning btn-sm">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>