<?php
session_start();
#redirect users who are not logged In
include '../accessControl/loggedIn.php';
Allowed();
include '../accessControl/adminLoggedIn.php';
Admin();
include '../homepage/navBar.php'
?>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<html>
  <div class ="container">
  <h1 id="tableHeading">Top 3 Quizzes</h1>
    <table class="displayTable" id="top3table">
      <tr id="headerRow">
	 <tr id="headerRow">
        <th>Quiz Name</th>
        <th>Attempts</th>
	<th>Average Score</th>
	 </tr>
	<tr>

  <?php
	 include '../connections/connectEmployee.php';
        session_start();

        $dbh = connectEmployee();

        $query_string = " call Asrcoo.list_visible_quizzes() ";

        $sth = $dbh->prepare($query_string);
        $sth->execute();

        $table_string= " ";
        foreach($sth->fetchAll() as $row){
                $table_string .= "<tr>\n";
		$table_string .= "<td>" . $row['name'] ."</td>\n";
		//In the future this will also list attempts and average scores
		$table_string .= "<td>" . "12" ."</td>\n";
		$table_string .= "<td>" . "100%" ."</td>\n";
		//In the future this will also list attempts and average scores
                $table_string .= "</tr>\n";

        }

        echo $table_string;
        ?>
      </table>
    </div>

  <div class ="container">
    <h1 id="tableHeading">All Quizzes</h1>
  <!-- search bar-->
    <table class="displayTable" id="searchBarRow">
      <th>
	<input class = "input" type="text" id="searchBox" onkeyup="searchQuizzes()" placeholder="Search quizzes..">
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
    </div>

  </table>
  </div>
</html>

<script>
//Search function for quiz table
function searchQuizzes() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchBox");
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

