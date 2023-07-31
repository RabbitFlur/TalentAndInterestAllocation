// Mengambil semua fieldset
var fieldsets = document.getElementsByClassName("fieldset-container");

// Mengambil semua tombol Next
var nextButtons = document.getElementsByClassName("next-button");

// Fungsi untuk memeriksa apakah minimal n radio button pada fieldset saat ini telah dipilih
function isMinRadiosSelected(fieldset, n) {
  var radioButtons = fieldset.querySelectorAll('input[type="radio"]');
  var selectedCount = Array.from(radioButtons).reduce(function(acc, radio) {
    return radio.checked ? acc + 1 : acc;
  }, 0);
  return selectedCount >= n;
}

// Fungsi untuk menampilkan fieldset berikutnya jika minimal n radio button telah dipilih
function showNextFieldset() {
  var currentFieldset = this.parentNode; // Fieldset saat ini
  var nextFieldset = currentFieldset.nextElementSibling; // Fieldset berikutnya

  if (isMinRadiosSelected(currentFieldset, 4)) {
    currentFieldset.classList.remove("active");
    currentFieldset.style.display = "none";

    if (nextFieldset) {
      nextFieldset.classList.add("active");
      nextFieldset.style.display = "block";
    }
  } else {
    alert("Pilih minimal 4 opsi sebelum melanjutkan.");
  }
}

// Menambahkan event listener ke setiap tombol Next
for (var i = 0; i < nextButtons.length; i++) {
  nextButtons[i].addEventListener("click", showNextFieldset);
}

// Fungsi untuk memeriksa apakah semua fieldset telah selesai diisi
function areAllFieldsetsCompleted() {
  for (var i = 0; i < fieldsets.length; i++) {
    if (fieldsets[i].classList.contains("active")) {
      return false;
    }
  }
  return true;
}

// Menambahkan event listener untuk mencegah tombol Next ditekan jika ada pertanyaan yang belum dijawab
for (var i = 0; i < nextButtons.length; i++) {
  nextButtons[i].addEventListener("click", function() {
    if (areAllFieldsetsCompleted()) {
      alert("Semua pertanyaan telah dijawab. Form selesai.");
    }
  });
}


