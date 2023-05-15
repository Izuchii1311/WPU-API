<?php

// ambil file coba dan jadikan sebagai array
$data =  file_get_contents('coba.json');
$mahasiswa = json_decode($data, true);

// Menjadi Array
var_dump($mahasiswa);
echo "<br><br>Pembimbing 1 : " . $mahasiswa[0]["pembimbing"]["pembimbing1"];
// var_dump($mahasiswa[0]["pembimbing"]["pembimbing1"]);

?>