<?php

// $mahasiswa = [
//     [
//     "nama" => "Luthfi Nur Ramadhan",
//     "npm" => "2142430",
//     "email" => "luthfiramadhan.lr55@gmail.com"
//     ],
//     [
//     "nama" => "Izuchii",
//     "npm" => "2142431",
//     "email" => "izuchii1311@gmail.com"
//     ],
// ];

// Menggunakan database
$dbh = new PDO('mysql:host=localhost;dbname=rest-api', 'root', '');
$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

// Merubah array menjadi JSON
$data = json_encode($mahasiswa);
echo $data;

?>