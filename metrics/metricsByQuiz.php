<?php
include '../homepage/navBar.php'
?>
<html>
  <head>
    <title>Metrics By Quiz</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <body>
    <!-- creates a container that will display the contents of the page -->
    <div class="container">
      <h1 id="tableHeading">Quiz Metrics</h1>
      <!-- creates a table that will display a list of quizzes that can be taken -->
      <!-- each entry will contain a button that will redirect to a preQuiz screen for that quiz -->
      <table class="displayTable" id="quizTable">
        <tr id="headerRow"> 
	  <th style="width:40%;">Quiz Name</th>
	  <th style="width:20%;">Quiz Author</th>
	  <th>Date Created</th>
	  <th>
	    <!-- creates a text box with the functionality of a search box -->
	    <input type="text" id="searchBox" onkeyup="myFunction()" placeholder="Search Quizzes">
	  </th>

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
		$table_string .= "<td>" . $row['author'] ."</td>\n";
		$table_string .= "<td>" . $row['date_created'] ."</td>\n";
		$table_string .= " <td>";
                $table_string .= " <form action='quizMetrics.php' method='get' name='view_quiz_metrics'> ";
		$table_string .= " <input id='submit' class='button' type='submit' style='width:125px;' value='View Quiz Metrics'/> ";
		$table_string .= " <input type='hidden' id='inspected_quiz_id' name='inspected_quiz_id' value='" . $row['quiz_id'] . "'/>";
                $table_string .= " <input type='hidden' id='inspected_quiz_name' name='inspected_quiz_name' value='" . $row['name'] . "'/>";
		$table_string .= " <input type='hidden' id='inspected_user_id' name='inspected_user_id' value='" . $row['author']  .   "'/>";
                $table_string .= "</form>";
                $table_string .= " </td>" ;
                $table_string .= "</tr>\n";

	}

	echo $table_string;
	?>	
      </table>
    </div>

    <!-- Javascript code that will enable the textbox to search through table entries
         and filter out results to match those in the textbox -->
    <script>
    function myFunction() {
      // Declare variables
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchBox");
      filter = input.value.toUpperCase();
      table = document.getElementById("quizTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 1; i < tr.length; i++) {
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

  </body>
</html>
