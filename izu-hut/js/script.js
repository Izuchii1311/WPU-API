// Mengambil data JSON menggunakan AJAX
function tampilkanSemuaMenu() {
$.getJSON('data/pizza.json', function(data) {
    // console.log(data);

    // Masuk ke dalam Menu
    let menu = data.menu;
    // console.log(menu);

    // looping object
    $.each(menu, function(i, data) {
        $('#daftar-menu').append('<div class="col-4"><div class="card mb-3"><img src="img/pizza/' + data.gambar+ '"    class="card-img-top"><div class="card-body"><h5 class="card-title"></h5>' + data.nama+ '<p class="card-text"</p>' + data.deskripsi+ '<h5 class="card-title">' + data.harga+ '</h5><a href="#" class="btn btn-primary">Pesan Sekarang.</a></div></div></div>');
    });
});
}

tampilkanSemuaMenu();

// Menyalakan li sesuai yang di klik
$('.nav-link').on('click', function() {
    $('.nav-link').removeClass('active');
    // li yang di klik
    $(this).addClass(' active');

    // merubah judul sesuai dengan li di navbar
    let kategori = $(this).html();
    $('h1').html(kategori);

    if(kategori == 'All Menu') {
        tampilkanSemuaMenu();
        // return saja supaya keluar dari function ini.
        return;
    }

    // menampilkan data berdasarkan kategori
    $.getJSON('data/pizza.json', function(data) {
        let menu = data.menu;
        let content = '';

        $.each(menu, function(i, data) {
            if (data.kategori == kategori.toLowerCase()){
                content += '<div class="col-4"><div class="card mb-3"><img src="img/pizza/' + data.gambar+ '"    class="card-img-top"><div class="card-body"><h5 class="card-title"></h5>' + data.nama+ '<p class="card-text"</p>' + data.deskripsi+ '<h5 class="card-title">' + data.harga+ '</h5><a href="#" class="btn btn-primary">Pesan Sekarang.</a></div></div></div>';
            }
        });

        $('#daftar-menu').html(content);
    });
});