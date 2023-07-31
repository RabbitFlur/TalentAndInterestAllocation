export function validatePhone() {
  const phoneInput = document.getElementById('phone');
  const phoneError = document.getElementById('phoneError');
  const phoneValue = phoneInput.value;

  // Menghapus karakter non-angka dari input No HP/WA
  const sanitizedPhone = phoneValue.replace(/[^0-9]/g, '');

  // Memeriksa panjang No HP/WA dan apakah hanya terdiri dari angka
  if (sanitizedPhone.length > 13) {
    // Memotong No HP/WA menjadi 13 karakter
    phoneInput.value = sanitizedPhone.slice(0, 13);
    phoneError.textContent = 'Hanya menerima maksimal 13 angka.';
    setTimeout(() => {
      phoneError.textContent = '';
    }, 2000); // Menampilkan pesan error selama 2 detik
  } else if (phoneValue !== sanitizedPhone) {
    phoneInput.value = sanitizedPhone;
    phoneError.textContent = 'Hanya angka yang diperbolehkan.';
  } else {
    phoneError.textContent = '';
  }

  if (phoneInput.validity.valid && phoneError.textContent === '') {
    phoneError.style.display = 'none';
  } else {
    phoneError.style.display = 'block';
  }
}

// Memanggil fungsi validatePhone saat input No HP/WA berubah
const phoneInput = document.getElementById('phone');
phoneInput.addEventListener('input', validatePhone);

