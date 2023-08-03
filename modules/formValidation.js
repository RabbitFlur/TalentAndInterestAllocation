// function validateForm() {
//   var password = document.getElementById("password").value;
//   var confirmPassword = document.getElementById("confirmPassword").value;

//   if (password !== confirmPassword) {
//     alert("Password dan konfirmasi password harus sama.");
//     return false;
//   } else {
//     return true;
//   }
// }



function validateForm() {
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirmPassword").value;

  if (password !== confirmPassword) {
    var errorMessage = "Password Tidak Sesuai";
    displayErrorModal(errorMessage);
    return false;
  } else {
    return true;
  }
}

function displayErrorModal(errorMessage) {
  var modal = document.getElementById("errorModal");
  var errorMessageText = document.getElementById("errorMessageText");
  errorMessageText.innerHTML = errorMessage;
  modal.style.display = "block";
}

function closeModal() {
  var modal = document.getElementById("errorModal");
  modal.style.display = "none";
}
