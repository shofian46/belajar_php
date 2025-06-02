<?php
$query = mysqli_query($conn, "SELECT * FROM contact  ORDER BY id_contact DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $queryDelete = mysqli_query($conn, "DELETE FROM contact WHERE id_contact='$id'");
  header("location:?page=contact&hapus=berhasil");
}
?>
<div class="table-responsive">

  <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Pesan</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      foreach ($row as $key => $data): ?>
        <tr>
          <!-- <td><?= $i++ ?></td> -->
          <td><?= $key + 1 ?></td>
          <td><?= $data['name'] ?></td>
          <td><?= $data['email'] ?></td>
          <td><?= $data['subject'] ?></td>
          <td><?= $data['message'] ?></td>
          <td>
            <a href="?page=contact&delete=<?= $data['id_contact'] ?>" class="btn btn-danger btn-sm d-flex justify-content-center align-items-center"
              onclick="return confirm('Are you sure you want to delete this message?')">Delete</a>
            <a href="?page=contact&balas-pesan=<?= $data['id_contact'] ?>" class="btn btn-primary btn-sm d-flex justify-content-center align-items-center my-3">Balas Pesan</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>