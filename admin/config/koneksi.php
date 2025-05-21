<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "db_porto";

$config = mysqli_connect($hostname, $username, $password, $dbname) or die("Koneksi gagal");

if (!$config) {
  echo "Koneksi gagal";
}
