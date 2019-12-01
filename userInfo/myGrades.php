<!-- allows data transfer through session -->
<?php
#includes the HTML code for the navigation bar
include "../homepage/navBar.php"
?>
  
<script>
var sess ='<?php
session_start();
?>'
</script>

<html>
  <head>
    <title>Grades | AFMS Online Onboarding Learning Resource</title>
    <!-- Links the CSS file -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>

  <body>
    <!-- creates a container that will display all the contents -->
    <div class="container">
      <h1 id="tableHeading">My Grades</h1>
      <!-- creates a table that will display the grades of the user -->
      <table class="displayTable" id="myGradeTable">
        <tr id="headerRow">
          <th>Quiz Name</th>
	  <th>Best Grade</th>
	  <th>
	    <!-- creates a text box with the functionality of a search box -->
	    <input type="text" id="searchBox" onkeyup="myFunction()" placeholder="Search quizzes..">
	  </th>
	</tr>

<?php

include '../connections/connectEmployee.php';
session_start();
$dbh = connectEmployee();
$user_id = $_SESSION['user_id'];
$query_string = " call Asrcoo.get_top_user_performances(:uid);";
$stmt = $dbh->prepare($query_string);
$stmt->bindParam(':uid', $user_id, PDO::PARAM_INT);
$stmt->execute();
$info_string = "";

foreach($stmt->fetchAll() as $row){
	$grade = $row['max_grade'];
	$grade = ($grade*100);
	
	$info_string .= "<tr>\n";
	$info_string .= "<td>" . $row['name'] ."</td>\n";
	$info_string .= "<td>" . $grade ."%</td>\n";
	$info_string .= "<td><!-- Intentionally left blank --></td>\n";
	$info_string .= "</tr>\n";
}

echo $info_string;
?>
      </table>
    </div>
</body>

<!-- Javascript code that will enable the textbox to search through table entries and filter out results -->

<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchBox");
  filter = input.value.toUpperCase();
  table = document.getElementById("myGradeTable");
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
