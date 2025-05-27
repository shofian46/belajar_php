<?php
include "config/koneksi.php";
//FUNGSI INSERT:
if (isset($_POST['simpan'])) {
  $profile_name = $_POST['profile_name']; //undifened array key profile_name
  $description = $_POST['description'];
  //PROSES SIMPAN FOTO
  // echo "<pre>";
  // print_r($_FILES['photo']['name']);
  // die;
  $photo = $_FILES['photo']['name']; //reza.png
  $tmp_name = $_FILES['photo']['tmp_name'];

  $fileName = uniqid() . "_" . basename($photo);
  $filePath = "uploads/" . $fileName;

  // mencari apakah di dalem table profiles ada datanya, jika ada maka update, jika tidak ada maka insert
  // mysqli_num_row()
  $queryProfile = mysqli_query($conn, "SELECT * FROM profiles ORDER BY id_profile DESC");
  if (mysqli_num_rows($queryProfile) > 0) {
    $rowProfile = mysqli_fetch_assoc($queryProfile);
    $id = $rowProfile['id_profile'];

    // jika user upload gambar
    if (!empty($photo)) {

      unlink("uploads/" . $rowProfile['photo']);
      move_uploaded_file($tmp_name, $filePath);

      $update = mysqli_query($conn, "UPDATE profiles SET 
            profile_name='$profile_name',  description='$description', photo='$fileName' WHERE id_profile ='$id'");
      header("location:?page=manage-profile&ubah=berhasil");
    } else {
      // perintah update
      $update = mysqli_query($conn, "UPDATE profiles SET 
            profile_name='$profile_name',  description='$description' WHERE id_profile ='$id'");
      header("location:?page=manage-profile&ubah=berhasil");
    }
  } else {
    // perintah insert
    if (!empty($photo)) {
      move_uploaded_file($tmp_name, $filePath);

      // JIKA USER UPLOAD GAMBAR
      $insertQ = mysqli_query($conn, "INSERT INTO profiles (profile_name,  description, photo) 
            VALUES ('$profile_name', '$description','$fileName')");
      header("location:?page=manage-profile&tambah=berhasil");
    } else {
      // JIKA USER TIDAK MENGUPLOAD GAMBAR
      $insertQ = mysqli_query($conn, "INSERT INTO profiles (profile_name,  description) 
            VALUES ('$profile_name', '$description')");
      header("location:?page=manage-profile&tambah=berhasil");
    }
  }
  // if ($photo['error'] == 0) {
  //     $fileName = uniqid() . "_" . basename($photo['name']);
  //     $filePath = "uploads/" . $fileName;
  //     move_uploaded_file($photo['tmp_name'], $filePath);
  //     $insertQ = mysqli_query($config, "INSERT INTO profiles (profile_name, profesion, description, photo) VALUES ('$profile_name', '$profesion', '$description', '$fileName')");
  // }
  // //END PROSES SIMPAN FOTO
  // if ($insertQ) {
  //     // header("location:?level=" . base64_encode($_SESSION['LEVEL']) . "&page=manage-profile");
  // }
}

$selectProfile = mysqli_query($conn, "SELECT * FROM profiles");
$row = mysqli_fetch_assoc($selectProfile);

if (isset($_GET['del'])) {
  $idDel = $_GET['del'];
  $selectPhoto = mysqli_query($config, "SELECT photo FROM profiles WHERE id= $idDel");
  $rowPhoto = mysqli_fetch_assoc($selectPhoto);
  unlink("uploads/" . $rowPhoto['photo']);
  $delete = mysqli_query($config, "DELETE FROM profiles WHERE id= $idDel");
  if ($delete) {
    // header("location:?level=" . base64_encode($_SESSION['LEVEL']) . "&page=manage-profile");
    // echo "<script></script>";
  }
}
?>
<form action="" method="post" enctype="multipart/form-data">
  <div>
    <div class="mb-3">
      <label class="form-label">Judul</label>
      <input type="text"
        value="<?php echo !isset($row['profile_name']) ? '' : $row['profile_name'] ?>" class="form-control" name="profile_name">
    </div>
    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea id="summernote" class="form-control" name="description" cols="30" rows="5"><?php echo !isset($row['description']) ? "" : $row['description'] ?></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Photo</label>
      <input type="file" name="photo" class="form-control">
    </div>
    <img src="uploads/<?php echo $row['photo'] ?>" width="150" alt=""><br>
    <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan Perubahan</button>

  </div>
</form>