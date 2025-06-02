<?php

$getId = $_GET['balas-pesan'] ?? null;
$selectMessage = mysqli_query($conn, "SELECT * FROM contact WHERE id_contact='$getId'");
$messageData = mysqli_fetch_assoc($selectMessage);
if (isset($_POST['kirim'])) {
  $email = $messageData['email'];
  $subject = $_POST['subject'];
  $pesan = $_POST['pesan'];

  // Send email
  $to = $email;
  $headers = "From:" . $config['email'] . "\r\n" .
    "Reply-To: " . $config['email'] . "\r\n" .
    "X-Mailer: PHP/" . phpversion();
  $send = mail($to, $subject, $pesan, $headers);
  if ($send) {
    echo "<script>alert('Pesan berhasil dikirim!');</script>";
    header("location:?page=contact");
  } else {
    echo "<script>alert('Gagal mengirim pesan.');</script>";
  }
}
