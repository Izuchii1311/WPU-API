<?php

// Ambil data json
$data = file_get_contents('data/pizza.json');

// Ubah menjadi Array
$menu = json_decode($data, true);
// Menimpa menu di jsonnya
$menu = $menu['menu'];

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WPU Hut - Latihan Episode 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
        <div class="container">
            <a class="navbar-brand" href="#"><img src="img/logo.png" alt="" width="120"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">All Menu</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <div class="container">

        <div class="row mt-3">
            <div class="col">
                <h1>All Menu</h1>
            </div>
        </div>

        <div class="row">
            <?php foreach($menu as $row) : ?>
            <div class="col-4">
                <div class="card mb-3">
                <img src="img/pizza/<?= $row['gambar'] ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['nama'] ?></h5>
                    <p class="card-text"><?= $row['deskripsi'] ?></p>
                    <h5 class="card-title"><?= $row['harga']  ?></h5>
                    <a href="#" class="btn btn-primary">Pesan Sekarang.</a>
                </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>