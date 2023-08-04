function togglePasswordVisibility(inputId) {
  var passwordInput = document.getElementById(inputId);
  var eyeIcon = document.querySelector("#" + inputId + " + .toggle-password #eyeIcon");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    eyeIcon.src = "../image/eye-open.png";
  } else {
    passwordInput.type = "password";
    eyeIcon.src = "../image/eye-closed.png";
  }
}
