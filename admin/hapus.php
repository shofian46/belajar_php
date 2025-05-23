<?php

require 'config/koneksi.php';
$id = $_GET["delete"];

if (hapus($id) > 0) {
	header('Location: user.php?role=' . base64_encode($_SESSION['role']));
} else {
	header('Location: user.php?role=' . base64_encode($_SESSION['role']));
}
