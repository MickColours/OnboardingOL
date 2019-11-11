<!-- allows data transfer through session -->
<?php 
#includes the HTML code for the navigation bar
include "../homepage/navBar.php";
session_start();

#redirects guests who are not logged in
include '../accessControl/loggedIn.php';
Allowed();
?>

<html>
  <head>
    <title>Edit a Quiz | AFMS Online Onboarding Learning Resource</title>
    <!-- Links the CSS code -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>

  <body>
    <!-- creates a container that will display the contents of the page -->
    <div class="container">
      <h1 id="tableHeading">Edit a Quiz</h1>
      <!-- creates a table that will display a list of quizzes to be edited
           each entry will contain a button which redirects to quiz editing -->
      <table class="displayTable" id="quizTable">
	<tr id="headerRow">
	  <th>Quiz Name</th>
	  <th>Author</th>
	  <th>Date Created</th>
	  <th>
	    <!-- creates a tet box with the functionality of a search box -->
	    <input type="text" id="searchBox" onkeyup="myFunction()" placeholder="Search Quizzes">
	  </th>
	</tr>

        <?php

        include '../connections/connectEmployee.php';
        session_start();

        $dbh = connectEmployee();

        $query_string = " call Asrcoo.list_user_quizzes() "; #REPLACE PROCEDURE WITH PROCEDURE THAT DISPLAYS ONLY QUIZZES THE USER OWNS

        $sth = $dbh->prepare($query_string);
        $sth->execute();

        $table_string= " ";
        foreach($sth->fetchAll() as $row){
                $table_string .= "<tr>\n";
                $table_string .= "<td>" . $row['name'] ."</td>\n";
                $table_string .= "<td>" . $row['author'] ."</td>\n";
                $table_string .= "<td>" . $row['date_created'] ."</td>\n";
                $table_string .= " <td>";
                $table_string .= " <form action='preQuiz.php' method='get' name='view_quiz'> ";
                $table_string .= " <input id='submit' class='button' type='submit' value='View Quiz'/> ";
                $table_string .= " <input type='hidden' id='inspected_quiz_name' name='inspected_quiz_name' value='" . $row['name'] . "'/>";
                $table_string .= " <input type='hidden' id='inspected_quiz_id' name='inspected_quiz_id' value='" . $row['quiz_id']  .   "'/>";
                $table_string .= " </form>";
                $table_string .= " </td>" ;
                $table_string .= "</tr>\n";

        }

        echo $table_string;
        ?>

      </table>
    </div>

    <!-- Javascript code that will filter table entries with the contents
         of the text box -->
    <script>
    function myFunction() {
      // Declare variables
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchBox");
      filter = input.value.toUpperCase();
      table = document.getElementById("quizTable");
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
  </body>
</html>

