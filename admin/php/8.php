<!-- variable System (var yg dibuat oleh php) -->
<!-- ! $_POST, $_GET, $_SESSION, $_SERVER, $_FILES, $_REQUEST -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Variable system | Superglobal var</title>
</head>

<body>
  <form action="" method="get">
    <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" name="nama" id="nama" placeholder="Masukkan nama anda" />
    </div>
    <br>
    <div class="form-group">
      <label for="nilai">Nilai</label>
      <input type="number" name="nilai" id="nilai" placeholder="Masukkan nama anda" />
    </div>
    <br>
    <div class="form-group">
      <button type="submit">Kirim</button>
    </div>
  </form>

  <?php
  if (isset($_GET['nama'])) {
    $name = $_GET['nama'];
    $value = $_GET['nilai'];
    $grade = '';
    $status = '';

    if ($value > 70) {
      $status = "Lulus";
    } else {
      $status = "Tidak Lulus";
    }

    if ($value >= 90) {
      $grade = "A";
    } elseif ($value >= 80) {
      $grade = "B";
    } elseif ($value >= 70) {
      $grade = "C";
    } elseif ($value >= 60) {
      $grade = "D";
    } else {
      $grade = "E";
    }
    echo "Nama Peserta: " . $name, "<br>" . " Nilai: " . $value, "<br>" . "grade: " . $grade, "<br>" . "Status:" . $status;
  }

  // $nama = isset($_POST['name']) ? $_POST['name'] : "";
  // echo "<br>";
  // echo "Selamat siang " . $nama;
  ?>
</body>

</html>