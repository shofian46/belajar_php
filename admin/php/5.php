<!-- if itu percabangan dan logika untuk menjalankan kode berdasarkan kondisi yg dicari -->

<?php

// = memberikan nilai
//  == membandingkan
//  == membandingkan dengan tipe datanya
//  !: tidak
//  !empty
// isset = tidak kosong
//  > = lebih besar, < = lebih kecil, >= lebih besar sama dengan

$nama = "bambang";
if ($nama == "bambang") {
  echo "Iya <br>";
} else {
  echo "Bukan";
}

if (isset($nama)) {
  echo "Yaa <br>";
} else {
  echo "Tidak";
}

$suhu = 35;

if ($suhu > 37) {
  echo "Demam";
} elseif ($suhu >= 35) {
  echo "Normal";
} else {
  echo "Kedinginan";
}
echo "<br>";
