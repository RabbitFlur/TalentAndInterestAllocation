export function validateNIM() {
  const nimInput = document.getElementById('nim');
  const nimError = document.getElementById('nimError');
  let nimValue = nimInput.value;

  // Menghapus karakter non-angka dari input NIM
  const sanitizedNIM = nimValue.replace(/[^0-9]/g, '');

  // Memeriksa panjang NIM dan apakah hanya terdiri dari angka

  if (nimValue !== sanitizedNIM) {
    nimInput.value = sanitizedNIM;
    nimError.textContent = 'NIM hanya boleh diisi dengan angka.';
    setTimeout(() => {
      nimError.textContent = '';
    }, 1000);
  } else if (sanitizedNIM.length < 9) {
    nimError.textContent = 'NIM harus terdiri dari 9 digit angka.';
    setTimeout(() => {
      nimError.textContent = '';
    }, 5000);
  }else if (sanitizedNIM.length > 9) {
      // Memotong NIM menjadi 9 karakter
      nimValue = sanitizedNIM.slice(0, 9);
      nimInput.value = nimValue;
      nimError.textContent = 'NIM maksimal hanya dapat terdiri dari 9 digit.';
      setTimeout(() => {
        nimError.textContent = '';
      }, 2000); // Menampilkan pesan error selama 2 detik
  } else {
    nimError.textContent = '';
  }

  if (nimInput.validity.valid && nimError.textContent === '') {
    nimError.style.display = 'none';
  } else {
    nimError.style.display = 'block';
  }
}

// Memanggil fungsi validateNIM saat input NIM berubah
const nimInput = document.getElementById('nim');
nimInput.addEventListener('input', validateNIM);

