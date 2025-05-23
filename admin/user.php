<?php include 'config/koneksi.php';

// munculkan data user
$query = mysqli_query($conn, "SELECT * FROM users ORDER BY user_id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="wrapper">
        <?php include 'inc/header.php' ?>
        <div class="content mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Data User
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div align="right" class="mb-3">
                                        <a href="tambah-user.php?role=<?= base64_encode($_SESSION['role']); ?>" class="btn btn-primary">Add</a>
                                    </div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($row as $key => $data): ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $data['name']; ?></td>
                                                    <td><?= $data['email']; ?></td>
                                                    <td>
                                                        <a href="edit.php?edit=<?= $data['user_id']; ?>&role=<?= base64_encode($_SESSION['role']) ?>" class="btn btn-success btn-sm">Edit</a>
                                                        <a onclick="return confirm('Are you sure?')" href="hapus.php?delete=<?= $data['user_id']; ?>"
                                                            class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>