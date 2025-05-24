<?php
session_start();
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
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>