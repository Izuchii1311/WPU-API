<?php

// Menggunakan clientURL
function get_CURL($url){
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    // mengembalikan text
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // eksekusi
    $result = curl_exec($curl);
    curl_close($curl);

    // json_decode(jika true jadi object jika false jadi array)
    return json_decode($result, true);
}

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCz_6wfT9e2moOT1ZkOZmFbA&key=AIzaSyAnkCSZL9HT8pwBH9Kvkas7sSJx0n0UE5Y');

$youtubeProfilePicture = $result['items'][0]['snippet']['thumbnails']['medium']['url']; 
$channelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];


// Latest Video
$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyAnkCSZL9HT8pwBH9Kvkas7sSJx0n0UE5Y&channelId=UCz_6wfT9e2moOT1ZkOZmFbA&maxResult=1&order=date&part=snippet';
$result = get_CURL($urlLatestVideo);

$latestVideoId = $result['items'][0]['id']['videoId'];

?>

<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Portofolio</title>
    </head>
    <body>
    
    <!-- Navigasi Bar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Luthfi Nur Ramadhan<img src="https://i.pinimg.com/originals/a5/38/3c/a5383cd9565316b5db8779d3875c7ac4.png" width="25" height="25"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="#home">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link active" href="#about">About</a>
                    <a class="nav-link active" href="#portofolio">Portofolio</a>
                    <a class="nav-link active" href="#contact">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid text-center" id="home">
        <div class="container">
            <img src="img/Izuchii.png" alt="" class="profile rounded-circle img-thumbnail" width="20%" height="20%">
            <h1 class="display-4">Luthfi Nur Ramadhan</h1>
            <p class="lead">Hanya latihan Bootstrap v.4.6</p>
        </div>
    </div>

    <!-- About -->
    <section class="about" id="about">
        <div class="container">
            <div class="row mb-4">
                <div class="col text-center">
                    <h3>About</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5 text-justify">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam placeat quae consectetur iste praesentium qui magnam velit ducimus sint perspiciatis?</p>
                </div>
                <div class="col-md-5 text-justify">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro atque hic rerum earum consequuntur, ullam numquam, totam nemo laudantium quod, alias tempora quam quibusdam deleniti quae inventore voluptas? Tempore, ratione!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Media -->
    <section class="social" id="social">
        <div class="container">
            <div class="row py-4 justify-content-center">
                <div class="col">
                    <h2 class="text-center">Social Media</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= $youtubeProfilePicture ?>" alt="" width="100" class="rounded-circle img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <h5 class="pt-3"><?= $channelName; ?></h5>
                            <p><?= $subscriber ?> Subscribers.</p>
                            <div class="g-ytsubscribe" data-channelid="UCz_6wfT9e2moOT1ZkOZmFbA" data-layout="default" data-count="default"></div>
                        </div>
                    </div>

                    <div class="row mt-3 mb-4">
                        <div class="col">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/<?= $latestVideoId ?>?rel=0" title="YouTube video" allowfullscreen></iframe>
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="row">
                    <div class="col-md-4">
                            <img src="img/Izuchii.png" alt="" width="100" class="rounded-circle img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <h5 class="pt-3">@izuchii3</h5>
                            <p>7000 Followers.</p>
                        </div>
                    </div>

                    <div class="row mt-3 mb-4">
                        <div class="col">
                            <div class="ig-thumbnail">
                                <img src="img/Portofolio/Hutao - Izuchii.png" alt="">
                            </div>
                            <div class="ig-thumbnail">
                                <img src="img/Portofolio/Usada Pekora V.1.1.png" alt="">
                            </div>
                            <div class="ig-thumbnail">
                                <img src="img/Portofolio/Liviana Vampire.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- End Social Media -->


    <!-- Portofolio -->
    <section id="portofolio" class="portofolio pt-4 mb-4 pb-4">
    <div class="container">
        <div class="row mb-4">
            <div class="col text-center">
                <h3>Portofolio</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <img src="img/Portofolio/Liviana Vampire.png" class="card-img-top" alt="Damslette">
                    <div class="card-body">
                        <h5 class="card-title">Logo Design</h5>
                        <p class="card-text">Logo Anime, Logo Product, Logo Name, Logo Company, and other</p>
                        <a href="#" class="btn btn-primary">Visit ></a>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <img src="img/Portofolio/Usada Pekora V.1.1.png" class="card-img-top" alt="Damslette">
                    <div class="card-body">
                        <h5 class="card-title">Ui Design</h5>
                        <p class="card-text">UI & UX Design, Ui anime Design, Banner, Overlay, Ui References.</p>
                        <a href="#" class="btn btn-primary">Visit ></a>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <img src="img/Portofolio/Hutao - Izuchii.png" class="card-img-top" alt="Damslette">
                    <div class="card-body">
                        <h5 class="card-title">Header Design</h5>
                        <p class="card-text">Anime Header Design, Header Social Media, Header Content, Header Promotion.</p>
                        <a href="#" class="btn btn-primary">Visit ></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <img src="img/Portofolio/Damslette.png" class="card-img-top" alt="Damslette">
                    <div class="card-body">
                        <h5 class="card-title">Game GFX</h5>
                        <p class="card-text">Create GFX Anime Charachter Game, Tutorial GFX, and Project Design</p>
                        <a href="#" class="btn btn-primary">Visit ></a>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <img src="img/Portofolio/Lamy - Izuchii.png" class="card-img-top" alt="Damslette">
                    <div class="card-body">
                        <h5 class="card-title">Anime GFX</h5>
                        <p class="card-text">Create GFX Anime, About Anime Charachter Design and Source.</p>
                        <a href="#" class="btn btn-primary">Visit ></a>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <img src="img/Portofolio/Suisei Hoshimachi - Izuchii.png" class="card-img-top" alt="Damslette">
                    <div class="card-body">
                        <h5 class="card-title">Vtuber GFX</h5>
                        <p class="card-text">Vtuber Image, Vtuber Name, Vtuber Design, Vtuber Logo, And other.</p>
                        <a href="#" class="btn btn-primary">Visit ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Contact -->
    <section class="contact" id="contact">
        <div class="container">
            <div class="row pt-3">
                <div class="col text-center">
                    <h2>Contact Us</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card text-white bg-warning mb-3 text-center">
                        <div class="card-body">
                          <h5 class="card-title">Contact Us</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, ullam.</p>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><b>Location</b></li>
                        <li class="list-group-item">Luthfi Nur Ramadhan</li>
                        <li class="list-group-item">Jl. Madesa No.21 Bandung Jawa Barat</li>
                        <li class="list-group-item">08572258409</li>
                        <li class="list-group-item">luthfiramadhan.lr55@gmail.com</li>
                      </ul>
                </div>

                <div class="col-lg-6">
                    <form>
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" id="name" placeholder="Input your name">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" placeholder="Input yout email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="pass" class="form-control" id="password" placeholder="Input yout password">
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea name="comment" id="comment" class="form-control" placeholder="Give me your Comment about my page."></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Send</button>
                        </div>
                      </form>
                </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white">
        <div class="container pt-3 pb-3">
            <div class="row">
                <div class="col text-center mt-1">
                    <p>Copyright 2022.</p>
                </div>
            </div>
        </div>
    </footer>



    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
    </body>
</html>