function validateForm() {
  // Lakukan validasi data pada form di sini
  var nama = document.getElementById("nama").value;
  var nim = document.getElementById("nim").value;
  var smt = document.getElementById("smt").value;
  var prodi = document.getElementById("menuprodi").value;
  var kabko = document.getElementById("menukabko").value;
  var phone = document.getElementById("phone").value;

  // Contoh validasi sederhana, pastikan data tidak kosong
  if (nama === "" || nim === "" || smt === "" || prodi === "" || kabko === "" || phone === "") {
    alert("Harap isi semua field pada form sebelum melanjutkan.");
    return false; // Mencegah form dikirim jika ada kesalahan
  }
}
