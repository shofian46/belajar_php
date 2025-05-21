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

        <header class="shadow-sm">
            <nav class="navbar navbar-expand-lg bg-body-white">

                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Admin</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Page
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="user.php">User</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
        </header>

        <div class="content mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Data User
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <label for="">Nama </label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Masukkan nama anda">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <label for="">Email </label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" placeholder="Masukkan Email anda">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <label for="">Password </label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control"
                                                placeholder="Masukkan password anda">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">

                                        </div>
                                        <div class="col-sm-1 ">
                                            <button type="submit" class="form-control btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
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