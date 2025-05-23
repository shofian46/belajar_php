<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "db_porto";

$conn = mysqli_connect($hostname, $username, $password, $dbname) or die("Koneksi gagal");
function query($sql)
{
  global $conn;
  $result = mysqli_query($conn, $sql);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}


function register($data)
{
  global $conn;

  $name = htmlspecialchars($_POST['name'], true);
  $email = htmlspecialchars($_POST['email'], true);
  $password = htmlspecialchars($_POST['password']);

  // cek username sudah pernah ada atau belum
  $cek_username = mysqli_query($conn, "SELECT * FROM users WHERE name = '$name'");

  if (mysqli_num_rows($cek_username) === 1) {
    echo "<script>
				alert('email sudah terpakai!');
				document.location.href = '';
			  </script>";
    return false;
  }

  // tambahkan user baru ke database
  // enkripsi password
  $password = sha1($password);

  // insert ke DB
  $sql = "INSERT INTO users VALUES ('', null, '$name', '$email', '$password', CURRENT_TIMESTAMP, null)";
  mysqli_query($conn, $sql);

  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  global $conn;
  mysqli_query($conn, "delete from users where user_id = $id");

  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  global $conn;

  $id = $data["id"];
  $nama = htmlspecialchars($data["name"]);
  $email = htmlspecialchars($data["email"]);
  $password = sha1($data["password"]);


  $sql = "UPDATE users SET
				name = '$nama',
				email = '$email',
				password = '$password'
			WHERE user_id = '$id'
			";

  mysqli_query($conn, $sql);

  return mysqli_affected_rows($conn);
}
