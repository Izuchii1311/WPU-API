// mengubah object menjadi json
// const mahasiswa = {
//     nama : "Luthfi Nur Ramadhan",
//     npm : "2142430",
//     email : "luthfiramadhan.lr55@gmail.com"
// }

// tampilnya object
// console.log(mahasiswa);

// Object ke JSON
// console.log(JSON.stringify(mahasiswa));

// JSON ke Object (AJAX) -- Vanilla JavaScript
// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function() {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//         let mahasiswa = JSON.parse(this.responseText);
//         console.log(mahasiswa);
//     }
// }
// xhr.open('GET', 'coba.json', true);
// xhr.send();

// JSON ke Object (JQuery) 
$.getJSON('coba.json', function (data) {
    console.log(data);  
});