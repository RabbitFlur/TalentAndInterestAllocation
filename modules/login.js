const loginButton = document.getElementById('loginButton');

lanjutButton.addEventListener('click', function () {
  const usernameInput = document.getElementById('username').value;
  const passwordInput = document.getElementById('password').value;

  if (usernameInput === validUsername && passwordInput === validPassword) {
    // Jika login sukses, alihkan ke halaman admin_dashboard.html
    window.location.href = 'admin_dashboard.html';
  } else {
    loginError.textContent = 'Username atau password salah. Silakan coba lagi.';
  }
});