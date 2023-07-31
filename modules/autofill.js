function removeAutofill(elementId) {
  const element = document.getElementById(elementId);
  if (element && element.tagName === "INPUT") {
      element.setAttribute("autocomplete", "off");
  }
}
removeAutofill("nama");
removeAutofill("nim");
removeAutofill("smt");
removeAutofill("phone");