document.addEventListener("DOMContentLoaded", function() {
  const questionForm = document.getElementById("questionForm");
  const submitButton = document.getElementById("kirim");

  questionForm.addEventListener("submit", function(event) {
    event.preventDefault();
    const fieldsets = questionForm.querySelectorAll(".fieldset-container");

    const results = [];
    fieldsets.forEach(function(fieldset) {
      const radioButtons = fieldset.querySelectorAll('input[type="radio"][value="yes"]:checked');
      results.push(radioButtons.length >= 3);
    });

    const finalResult = results.every(result => result);

    // Redirect to outputjawaban.php with the finalResult
    window.location.href = `../controller/outputjawaban.php?result=${finalResult}`;
  });
});
