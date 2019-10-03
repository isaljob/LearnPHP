// ambil element2 yang dibutuhkan dengan DOM
var keyword = document.getElementById('keyword');
var tomboCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

// tambahkan event ketika keyword ditulis
// memberikan perintah pada JS
keyword.addEventListener('keyup', function(){
  // buat object ajax
  // biasanya diberikan nama variable xhr atau ajax
  var xhr = new XMLHttpRequest();

  // cek kesiapan ajax
  xhr.onreadystatechange = function(){
    if(xhr.readyState == 4 && xhr.status == 200){
      container.innerHTML = xhr.responseText;
    }
  }

  // eksekusi ajax
  // mengambil data plus mengirimkan data dengan request method GET
  xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true); // (parameter: request method, source, true or false ajax)
  xhr.send();
})
