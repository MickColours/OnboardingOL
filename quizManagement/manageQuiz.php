<!-- allows data transfer through session
	Authors: Victor , ? , Matt

 -->
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
      <h1 id="tableHeading">Manage a Quiz</h1>
      <!-- creates a table that will display a list of quizzes to be edited
           each entry will contain a button which redirects to quiz editing -->
      <table class="displayTable" id="quizTable">
	<tr id="headerRow">
	  <th style="width:45%;">Quiz Name</th>
	  <th>Author</th>
	  <th style="width:15%">Date Created</th>
	  <th style="width:5%">Visibility</th>
	  <th>
	    <!-- creates a tet box with the functionality of a search box -->
	    <input type="text" id="searchBox" onkeyup="myFunction()" placeholder="Search Quizzes">
	  </th>
	</tr>

        <?php

        include '../connections/connectEmployee.php';
        session_start();

        $dbh = connectEmployee();

	//check the user privileges 
	if ($_SESSION['user_privilege']==2){ //mentors get to see all quizzes
		$query_string = " call Asrcoo.list_all_quizzes();"; 
	}else { //employees get to see only there quizzes	
		$query_string = " call Asrcoo.list_user_quizzes(" . $_SESSION['user_id'] . ") ";
	}
        $sth = $dbh->prepare($query_string);
        $sth->execute();

        $table_string= " ";
        foreach($sth->fetchAll() as $row){
                $table_string .= "<tr>\n";
                $table_string .= "<td>" . $row['name'] ."</td>\n";
		$table_string .= "<td>" . $row['author'] ."</td>\n"; #in the future maybe mentors can manage
		$table_string .= "<td>" . $row['date_created'] ."</td>\n";
		$table_string .= "<td>" . $row['visibility'] . "</td>\n";

		$table_string .= " <td>";
		//edit quiz form
                $table_string .= " <form class='manageButton' action='/quizManagement/edit/loadEditQuiz.php' method='get' name='view_quiz'> ";
		$table_string .= " <input id='editQuizButton' class='button' type='submit' value='Edit Quiz'/> ";
		$table_string .= " <input type='hidden' id='inspected_quiz_name' name='inspected_quiz_name' value='" . $row['name'] . "'/>";
                $table_string .= " <input type='hidden' id='inspected_quiz_id' name='inspected_quiz_id' value='" . $row['quiz_id']  .   "'/>";
		$table_string .= " </form>";
		//toggle quiz visibility, add logic, to change button value .. 
		$table_string .= " <form class='manageButton' action='/quizManagement/toggleQuizVisibility.php' method='get' name='view_quiz'> ";
		$table_string .= " <input id='visibilityButton' class='button' type='submit' style='width:100px' value='Toggle Visibility'/> ";
		$table_string .= " <input type='hidden' id='inspected_quiz_id' name='inspected_quiz_id' value='" . $row['quiz_id']  .   "'/>";
		$table_string .= " </form>";

		//remove quiz
		$table_string .= " <form class='manageButton' action='/quizManagement/deleteQuiz.php' method='get' name='view_quiz'> ";
		$table_string .= " <input id='deleteButton' class='button' type='submit' value='Delete'/> ";
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

