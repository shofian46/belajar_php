<?php
$query = mysqli_query($conn, "SELECT * FROM resume ORDER BY id ASC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $queryDelete = mysqli_query($conn, "DELETE FROM resume WHERE id='$id'");
  header("location:?page=contact&hapus=berhasil");
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
      <!-- <?php $i = 1;
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
      </td>
      </tr>
    <?php endforeach ?> -->
    </tbody>
  </table>
</div>