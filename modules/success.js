const announcement = document.getElementById('successMessage');
function fadeInEffect(element) {
  let opacity = 0;
  const interval = setInterval(() => {
    opacity += 0.05;
    element.style.opacity = opacity;
    if (opacity >= 1) {
      clearInterval(interval);
    }
  }, 50); 
}

// Panggil fungsi fadeInEffect setelah halaman selesai dimuat
window.onload = function() {
  fadeInEffect(announcement);
};
// Mengatur redirect menggunakan JavaScript setelah 3 detik
setTimeout(function() {
  window.location.href = "home.php";
}, 3000);