<?php
session_start();
setlocale(LC_ALL, 'IND');

$_name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
if (!$_name) {
    header('Location: index.php?access=failed');
    exit();
}

include 'config/koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.css" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <?php include 'inc/header.php' ?>
            <div class="content mt-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <?= isset($_GET['page']) ? str_replace("-", " ", ucfirst($_GET['page'])) : 'Home' ?>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_GET['page'])) {
                                        // jika ada page yang dipilih
                                        if (file_exists("content/" . $_GET['page'] . '.php')) {
                                            include "content/" . $_GET['page'] . ".php";
                                        } else {
                                            include 'content/404.php';
                                        }
                                    } else {
                                        include 'content/home.php';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>