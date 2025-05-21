<?php
// array = tas

//cara pembuatan array
// $nama = array();
// $nama = [];
//array index (data yang bisa lebih dari 1)
$nama = array('Will', 'iam', 'Set');
echo $nama[0];
echo "<br>";
echo $nama[1];
echo "<br>";
echo $nama[2];
echo "<br>";
print_r($nama);
echo "<br>";
echo "<br>";

$buah = ["Pisang", "Melon", "Apel", "Kiwi"];
print_r($buah);
echo "<br>";

//perulangan
foreach ($buah as $b) {
    echo "Nama nama buah " . $b;
    echo "<br>";
}
echo "<br>";

//array assosiatif: key yang menggunakan string untuk pemanggilannya dan pendefinisiannya
$kelas_web = [
    "nama" => "Will",
    "umur" => 21,
    "jurusan" => "Junior Web Programming",
];

echo "Nama Siswa " . $kelas_web['nama'] . " Umur " . $kelas_web['umur'] . " Jurusan " . $kelas_web['jurusan'];
echo "<br>";

$siswa = [
    [
        "nama" => "Iam",
        "umur" => "22",
        "jurusan" => "Junior Web Programming",
    ], //bisa menggunakan array() untuk pengganti []
    [
        "nama" => "Set",
        "umur" => 23,
        "jurusan" => "Junior Web Programming",
    ],
];

print_r($siswa);
echo "<br>";
echo $siswa[1]['nama'];
echo "<br>";
foreach ($siswa as $key => $sw) {
    echo "Key: " . $key . "<br>";
    echo "Nama: " . $sw['nama'] . "<br>";
    echo "Umur: " . $sw['umur'] . "<br>";
    echo "Jurusan: " . $sw['jurusan'] . "<br>";
    echo "<br>";
}
