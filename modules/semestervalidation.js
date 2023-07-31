export function validateSMT() {
  const smtInput = document.getElementById('smt');
  const smtError = document.getElementById('smtError');
  let smtValue = smtInput.value;

  // Menghapus karakter non-angka dari input Semester
  const sanitizedSMT = smtValue.replace(/[^0-9]/g, '');

  // Memeriksa panjang Semester dan apakah hanya terdiri dari angka
  if (sanitizedSMT.length > 2) {
    // Memotong Semester menjadi 2 karakter
    smtValue = sanitizedSMT.slice(0, 2);
    smtInput.value = smtValue;
    smtError.textContent = 'Maksimal hanya dua angka.';
    setTimeout(() => {
      smtError.textContent = '';
    }, 2000); // Menampilkan pesan error selama 2 detik
  } else if (smtValue !== sanitizedSMT) {
    smtInput.value = sanitizedSMT;
    smtError.textContent = 'Hanya angka yang diperbolehkan.';
  } else {
    smtError.textContent = '';
  }

  if (smtInput.validity.valid && smtError.textContent === '') {
    smtError.style.display = 'none';
  } else {
    smtError.style.display = 'block';
  }
}

// Memanggil fungsi validateSMT saat input Semester berubah
const smtInput = document.getElementById('smt');
smtInput.addEventListener('input', validateSMT);

