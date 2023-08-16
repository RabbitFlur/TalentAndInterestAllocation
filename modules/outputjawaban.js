const form = document.getElementById('questionForm');
const fieldsets = form.querySelectorAll('.fieldset-container');

form.addEventListener('submit', (event) => {
  event.preventDefault();

  const allOutput = [];

  fieldsets.forEach((fieldset, index) => {
    const output = fieldset.querySelector('.output');
    const answers = fieldset.querySelectorAll(`input[type="radio"]:checked`);
    const yesAnswers = Array.from(answers).filter(answer => answer.value === 'yes');

    // Set output based on the logic: TRUE if at least 3 "yes" answers, otherwise FALSE
    // const outputValue = yesAnswers.length >= 3;
    // output.innerHTML = `Kelompok Pertanyaan ${index + 1} Output: ${outputValue}`;

    const outputValue = yesAnswers.length >= 3;
    allOutput.push(outputValue);
  });
  const nextPage = `hasiloutput.php?outputs=${allOutput.join(',')}`;
  window.location.href = nextPage;

  const url = 'save_output.php';
  const data = { outputs: allOutput };

  fetch(url, {
    method: 'POST',
    body: JSON.stringify(data),
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => response.json())
  .then(result => {
    // Handle response from backend if needed
  })
  .catch(error => {
    console.error('Error:', error);
  });
});
