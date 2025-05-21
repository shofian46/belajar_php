<?php

$peserta = 'Shofian Al Fikri';
$nilai = 81;
$grade = '';
$status = '';


if ($nilai > 70) {
  $status = "Lulus";
} else {
  $status = "Tidak Lulus";
}

if ($nilai >= 90) {
  $grade = "A";
} elseif ($nilai >= 80) {
  $grade = "B";
} elseif ($nilai >= 70) {
  $grade = "C";
} elseif ($nilai >= 60) {
  $grade = "D";
} else {

  $grade = "E";
}

echo "Nama Peserta: " . $peserta, "<br>" . " Nilai: " . $nilai, "<br>" . "grade: " . $grade, "<br>" . "Status:" . $status;
echo "<br> <br>";


// Operator logika
// AND, OR, &&, ||, !

$username = "superadmin";
$password = "admin123";

if ($username == "superadmin" && $password == "admin123") {
  echo "Signin berhasil";
} else {
  echo "Signin gagal";
}
