<!- allows data transfer through session -->
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
	  <th>Date Taken</th>
	  <th>
	    <!-- creates a text box with the functionality of a search box -->
	    <input type="text" id="searchBox" onkeyup="myFunction()" placeholder="Search quizzes..">
	  </th>
	</tr>
	<tr>
	  <td>Sample Quiz</td>
	  <td>100%</td>
	  <td>4/20/2069</td>
	  <td><!-- Intentionally Left Blank --></td>
	</tr>
	<tr>
	  <td>General ASRC Info</td>
	  <td>85%</td>
	  <td>4/20/2069</td>
	  <td><!-- Intentionally Left Blank --></td>
	</tr>
	<tr>
	  <td>Placeholder 1</td>
	  <td>95%</td>
	  <td>4/20/2069</td>
	  <td><!-- Intentionally Left Blank --></td>
	</tr>
	<tr>
	  <td>Placeholder 2</td>
	  <td>70%</td>
	  <td>4/20/2069</td>
	  <td><!-- Intentionally Left Blank --></td>
	</tr>
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
