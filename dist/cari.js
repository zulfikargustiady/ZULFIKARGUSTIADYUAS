
// Fungsi untuk menangani perubahan input pencarian
function searchTable() {
  // Ambil nilai input pencarian
  var input = document.getElementById('searchInput');
  var filter = input.value.toUpperCase();

  // Ambil tabel dan baris
  var table = document.getElementById('example1');
  var rows = table.getElementsByTagName('tr');

  // Iterasi melalui baris, mulai dari baris kedua (indeks 1) untuk melewati baris nama kolom
  for (var i = 1; i < rows.length; i++) {
    var cells = rows[i].getElementsByTagName('td');
    var showRow = false;

    // Iterasi melalui sel-sel dalam baris
    for (var j = 0; j < cells.length; j++) {
      var cellText = cells[j].innerText || cells[j].textContent;

      if (cellText.toUpperCase().indexOf(filter) > -1) {
        showRow = true;
        break;
      }
    }

    // Tampilkan atau sembunyikan baris sesuai dengan hasil pencarian
    rows[i].style.display = showRow ? '' : 'none';
  }
}

// Tambahkan event listener untuk memanggil fungsi pencarian pada setiap perubahan input
document.getElementById('searchInput').addEventListener('input', searchTable);

// Panggil fungsi pencarian untuk pertama kali saat halaman dimuat
searchTable();