// function capitalizeInputText(event) {
//   const input = event.target;
//   const words = input.value.split(' ');
//   const capitalizedWords = words.map(word => {
//     return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
//   });
//   input.value = capitalizedWords.join(' ');
// }

// const inputTextElements = document.querySelectorAll('.input-text');
// inputTextElements.forEach(element => {
//   element.addEventListener('input', capitalizeInputText);
// });



function capitalizeInputText(event) {
  const input = event.target;
  const shouldIgnore = input.dataset.ignore === 'true';

  if (shouldIgnore) {
    return;
  }

  let inputValue = input.value;

  // Menghapus karakter angka dan simbol dari input
  inputValue = inputValue.replace(/[^a-zA-Z\s]/g, '');

  const words = inputValue.split(' ');
  const capitalizedWords = words.map(word => {
    return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
  });

  input.value = capitalizedWords.join(' ');
}

const inputTextElements = document.querySelectorAll('.input-text');
inputTextElements.forEach(element => {
  element.addEventListener('input', capitalizeInputText);
});

