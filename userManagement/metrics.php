<?php
session_start();
?>
<link rel="stylesheet" type="text/css" href="/css/style_user_manage.css">
<link rel="stylesheet" type="text/css" href="/css/style_buttons.css">
<html>
  <div class ="box";
  <h1>Top 3 Quizzes</h1>
   <table id ="bestQuizList">
    <tr class ="columnName">
      <th>Quiz Name</th>
      <th>Attempts</th>
      <th>Average Score</th>
    </tr>
    <tr>
    <td>Sample Quiz</td>
    <td>20</td>
    <td>95%</td>
    </tr>
    <tr>
    <td>Jets</td>
    <td>10</td>
    <td>88%</td>
    </tr>
    <tr>
    <td>Helicopters</td>
    <td>5</td>
    <td>100%</td>
    </tr>
  </table>
</div>
 <div class ="box";
   <!-- search bar-->
   <br><input class = "input" type="text" id="searchBar" onkeyup="searchQuizzes()" placeholder="Search quizzes..">
  <table id ="quizList">
    <tr class ="columnName">
      <th>Quiz Name</th>
      <th>Attempts</th>
      <th>Average Score</th>
    </tr>
    <tr>
    <td>Sample Quiz</td>
    <td>20</td>
    <td>95%</td>
    </tr>
    <tr>
    <td>Jets</td>
    <td>10</td>
    <td>88%</td>
    </tr>
    <tr>
    <td>Helicopters</td>
    <td>5</td>
    <td>100%</td>
    </tr>
  </table>
 </div>
</html>

<script>
//Search function for quiz table
function searchQuizzes() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchBar");
  filter = input.value.toUpperCase();
  table = document.getElementById("quizList");
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

