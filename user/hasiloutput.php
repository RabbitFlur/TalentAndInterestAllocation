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
                    const outputElement = document.createElement('p');
                    outputElement.textContent = `${kelompokPertanyaan[index]}`;
                    resultsDiv.appendChild(outputElement);
                }
            });
        }
    </script>
<?php include '../template/footer.php'; ?>
