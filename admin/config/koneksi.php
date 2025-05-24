<?php
$hostname = "localhost";
$hostusername = "root";
$hostpassword = "";
$hostdatabase = "db_porto";
$conn = mysqli_connect($hostname, $hostusername, $hostpassword, $hostdatabase);

if (!$conn) {
  echo "Connection Failed";
}
