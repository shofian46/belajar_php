<?php
$siswa = [
    [
        "nama" => "Iam",
        "umur" => "22",
        "jurusan" => "Junior Web Programming",
        "status" => 1,
    ], //bisa menggunakan array() untuk pengganti []
    [
        "nama" => "Set",
        "umur" => 23,
        "jurusan" => "Junior Web Programming",
        "status" => 2,
    ],
];

function ubahStatus($status)
{
    switch ($status) {
        case '1':
            return "Aktif";
            break;
        default:
            return "Tidak Aktif";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="row mt-3 d-flex justify-content-center border-bottom-primary">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">Data Siswa</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Umur</th>
                                        <th>Jurusan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($siswa as $key => $sw) { ?>
                                        <tr>
                                            <td><?php echo $sw['nama'] ?></td>
                                            <td><?php echo $sw['umur'] ?></td>
                                            <td><?php echo $sw['jurusan'] ?></td>
                                            <td>
                                                <?php echo $sw['status'] == 1 ? '<span class="badge rounded-pill bg-primary">active</span>' : '<span class="badge rounded-pill bg-danger">not active</span>' ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>