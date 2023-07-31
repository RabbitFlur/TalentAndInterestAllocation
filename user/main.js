import { prosesForm } from '../modules/formHandler.js';

// Tambahkan event listener pada tombol submit formulir
const form = document.getElementById("questionForm");
form.addEventListener("submit", prosesForm);
