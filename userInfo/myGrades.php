<?php include "../homepage/homepage.php" ?>
<script>
var sess ='<?php
session_start();
?>'
</script>
<html>

<link rel="stylesheet" type="text/css" href="/css/style_general_table.css">

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search quizzes..">

<div class="box">
<h1>My Grades</h1>
<table id="generalTable" class="generalTable">
  <tr class="tableHeader">
    <!--th style="width:90%;"--><th>Quiz Name</th>
    <!--th style="width:50%;"--><th>Grade</th>
  </tr>
  <tr>
    <td>Sample Quiz</td>
    <td>100%</td>
  </tr>
  <tr>
    <td>General ASRC Info</td>
    <td>85%</td>
  </tr>
  <tr>
    <td>Placeholder 1</td>
    <td>95%</td>
  </tr>
  <tr>
    <td>Placeholder 2</td>
    <td>70%</td>
  </tr>
</table>
</div>

<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("generalTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

</html>
