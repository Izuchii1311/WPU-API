// Connect jsonnya bekerja ketika kita telah melakukan sesuatu di inputnya
// Ketika menginputkan di search dan di klik searchnya akan melakukan request ke server.

function searchMovie() {
    $('#movie-list').html('');

    $.ajax({
        url: 'http://omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey': '5be44a60',
            's': $('#search-input').val()
        },
        success: function(result) {
            if (result.Response == "True"){
                let movies = result.Search;
                // console.log(movies);

                $.each(movies, function(i, data) {
                    $('#movie-list').append(`
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <img src="`+ data.Poster +`" class="card-img-top">
                            <div class="card-body">
                            <h5 class="card-title">`+ data.Title +`</h5>
                            <p class="card-text">`+ data.Type + data.Year +`</p>
                            <a href="#" class="card-link see-detail" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="`+ data.imdbID+`">See Detail</a>
                            </div>
                        </div>
                    </div>
                    `)
                });

                $('#search-input').val('');

            } else {
                $('#movie-list').html(`
                <div class="col text-center justify-content-center">
                    <h1 class="text-center mt-5 pt-5" style="color: grey;">`+ result.Error +`</h1>
                </div>
                `)

            }
        }
    });
}

$('#search-button').on('click', function(){
    searchMovie();
});

$('#search-input').on('keyup', function(e) {
    if (e.which == 13) {
        searchMovie();
    }
});

$('#movie-list').on('click', '.see-detail', function() {
    $.ajax({
        url: 'http://omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey': '5be44a60',
            // this adalah tombol see-detail yang di klik
            'i': $(this).data('id')
        },
        success: function (movie) {
            if (movie.Response == "True"){

                $('.modal-body').html(`
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="`+ movie.Poster +`" class="img-fluid">
                            </div>

                            <div class="col-md-8">
                                <ul class="list-group">
                                    <li class="list-group-item"><h3>`+ movie.Title +`</h3></li>
                                    <li class="list-group-item">Release `+ movie.Release +`</li>
                                    <li class="list-group-item">Genre : `+ movie.Genre +` `+ movie.Runtime+`</li>
                                    <li class="list-group-item">Actors : `+ movie.Actors +`</li>
                                    <li class="list-group-item">Writers : `+ movie.Writers +`</li>
                                    <li class="list-group-item">`+ movie.Plot +`</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                `)

            }
        }
    })
})