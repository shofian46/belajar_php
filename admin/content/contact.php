<?php
$query = mysqli_query($conn, "SELECT * FROM contact  ORDER BY id_contact DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $queryDelete = mysqli_query($conn, "DELETE FROM contact WHERE id_contact='$id'");
  header("location:user.php?hapus=berhasil");
}
?>
<div class="table-responsive">

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Pesan</th>
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
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>