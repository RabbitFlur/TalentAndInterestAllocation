document.addEventListener("DOMContentLoaded", function() {
  var searchButton = document.getElementById("search");
  if (searchButton) {
      searchButton.addEventListener("click", filterTableByNIM);
  }
});

function filterTableByNIM() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("nim");
  filter = input.value.toUpperCase();
  table = document.querySelector(".tabel-data");
  tr = table.getElementsByTagName("tr");

  for (i = 1; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[3]; // Column index for NIM
      if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
          } else {
              tr[i].style.display = "none";
          }
      }
  }
  
  //  Reset pagination to the first page when filtering
  document.location.href = "homepageadmin.php?page=1&nim=" + encodeURIComponent(filter);
}








