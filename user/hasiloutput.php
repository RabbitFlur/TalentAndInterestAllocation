<?php include '../template/header.php'; ?>
<title>Hasil Output</title>
</head>
<body>
    <div id="results"></div>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const outputsParam = urlParams.get('outputs');

        if (outputsParam) {
            const outputs = outputsParam.split(',').map(output => output === 'true');
            const resultsDiv = document.getElementById('results');
            
            outputs.forEach((outputValue, index) => {
                const outputElement = document.createElement('p');
                outputElement.textContent = `Kelompok Pertanyaan ${index + 1} Output: ${outputValue}`;
                resultsDiv.appendChild(outputElement);
            });
        }
    </script>
<?php include '../template/footer.php'; ?>
