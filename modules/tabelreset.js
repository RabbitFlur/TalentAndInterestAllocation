document.addEventListener("DOMContentLoaded", function() {
  var resetButton = document.getElementById("reset");
  if (resetButton) {
      resetButton.addEventListener("click", resetTable);
  }
});
function resetTable() {
  var input = document.getElementById("nim");
  input.value = ""; // Menghapus teks di kolom pencarian
  
  // Menghapus parameter nim dari URL
  var url = new URL(window.location.href);
  url.searchParams.delete("nim");
  history.pushState({}, "", url.toString());

  // Mengirim ulang form untuk memunculkan semua data
  document.querySelector("form").submit();
}