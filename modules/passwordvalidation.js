  document.addEventListener("DOMContentLoaded", function () {
    // Ambil referensi elemen-elemen yang akan digunakan
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirmPassword");
    const lanjutButton = document.getElementById("lanjut");

    // Disable kolom konfirmasi password jika kolom password belum diisi minimal 6 karakter
    passwordInput.addEventListener("input", function () {
      const passwordValue = passwordInput.value.trim();
      if (passwordValue.length < 6) {
        confirmPasswordInput.value = "";
        confirmPasswordInput.disabled = true;
        confirmPasswordInput.nextElementSibling.innerHTML = "";
      } else {
        confirmPasswordInput.disabled = false;
      }
    });

    // Validasi kolom konfirmasi password saat pengguna menginput
    confirmPasswordInput.addEventListener("input", function () {
      const passwordValue = passwordInput.value.trim();
      const confirmPasswordValue = confirmPasswordInput.value.trim();

      // Jika password dan konfirmasi password sama, aktifkan tombol lanjut
      if (passwordValue === confirmPasswordValue) {
        lanjutButton.disabled = false;
        confirmPasswordInput.nextElementSibling.innerHTML = "";
      } else {
        // Jika password dan konfirmasi password berbeda, nonaktifkan tombol lanjut dan tampilkan pesan error
        lanjutButton.disabled = true;
        confirmPasswordInput.nextElementSibling.innerHTML = "Konfirmasi password tidak sesuai.";
      }
    });
  });
