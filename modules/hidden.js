var fieldsets = document.getElementsByClassName("fieldset-container");
      
// Menyembunyikan fieldset kecuali yang pertama
for (var i = 1; i < fieldsets.length; i++) {
  fieldsets[i].style.display = "none";
}