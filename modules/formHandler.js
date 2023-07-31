// Function untuk memproses pengiriman formulir
export function prosesForm(event) {
  event.preventDefault(); // Mencegah formulir dikirimkan secara normal

  // Inisialisasi sebuah array untuk menyimpan hasil dari setiap fieldset
  const hasil = [];

  // Dapatkan semua fieldset (kecuali yang terakhir yang berisi tombol submit)
  const fieldsets = document.querySelectorAll(".fieldset-container:not(:last-of-type)");

  // Perulangan melalui setiap fieldset untuk memeriksa nilai radio button
  fieldsets.forEach((fieldset) => {
    const radios = fieldset.querySelectorAll('input[type="radio"][value="yes"]:checked');
    const hasilFieldset = radios.length >= 3; // Diatur menjadi true jika minimal 3 nilai "Ya" terpilih, false jika kurang dari 3.
    hasil.push(hasilFieldset); // Simpan hasil dalam array
  });

  // Pada tahap ini, array 'hasil' akan berisi nilai true atau false untuk setiap kelompok pertanyaan.
  // Anda dapat mengirimkan array 'hasil' ke server menggunakan permintaan AJAX atau metode lainnya, kemudian menyimpan data tersebut ke dalam database sesuai kebutuhan.
  console.log("Hasil: ", hasil);
}
