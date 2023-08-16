const urlParams = new URLSearchParams(window.location.search);
const outputsParam = urlParams.get('outputs');

  if (outputsParam) {
  const outputs = outputsParam.split(',').map(output => output === 'true');
  const resultsDiv = document.getElementById('results');

  const kelompokPertanyaan = [
    'Linguistik',
    'Logis Matematis',
    'Kinestetik',
    'Musikal',
    'Interpersonal',
    'Intrapersonal'
   ];

  outputs.forEach((outputValue, index) => {
    if (outputValue) {
    const outputElement = document.createElement('div');
    outputElement.classList.add('result-item');
                    
    const icon = document.createElement('span');
    icon.classList.add('icon');
    icon.innerHTML = '★'; // Isi dengan ikon yang sesuai, misalnya Font Awesome
                   
    const text = document.createElement('span');
    text.classList.add('text');
    text.textContent = ` ${kelompokPertanyaan[index]}`;

    outputElement.appendChild(icon);
    outputElement.appendChild(text);
                    
    resultsDiv.appendChild(outputElement);
    }
  });
}