<?php
session_start();
#redirect users who are not logged In
include '../accessControl/loggedIn.php';
Allowed();
include '../homepage/navBar.php'
?>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<html>
  <div class ="container">
  <h1 id="tableHeading">Top 3 Quizzes</h1>
    <table class="displayTable" id="top3table">
      <tr id="headerRow">
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
  <div class ="container">
    <h1 id="tableHeading">All Quizzes</h1>
  <!-- search bar-->
    <table class="displayTable" id="searchBarRow">
      <th>
	<input class = "input" type="text" id="searchBar" onkeyup="searchQuizzes()" placeholder="Search quizzes..">
      </th>
    </table>
  <br>
  <table class="displayTable" id="quizList">
    <tr id="headerRow">
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

