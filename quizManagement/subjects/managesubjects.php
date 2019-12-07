<?php
#includes the HTML code for the navigation bar
include "../../homepage/navBar.php";
session_start();

#redirects guests who are not logged in
include '../../accessControl/loggedIn.php';
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
    <div class="container" id="uploadFileBox">
      <h1 id="quizInfoHeader">Manage Subjects</h1><br>
      <!-- creates a table that will display a list of quizzes to be edited
           each entry will contain a button which redirects to quiz editing -->

    <form action = 'http://54.198.147.202/quizManagement/subjects/createSubject.php'>

      <input id='createQuizButton' class='button' type='submit' value='Create Subject'/>
    </form>


    <table class="displayTable" id="subjectTable">
	<tbody>
        <tr id="headerRow">
          <th style="width:40%">Subject</th>
          <!-- <th>Author</th> As of now , the data relies on a query that assumes the user is the author
                ergo, author is not needed , may change in the future Matt -->
          <th>
            <!-- creates a tet box with the functionality of a search box -->
            <input type="text" id="searchBox" onkeyup="myFunction()" placeholder="Search Subjects">
          </th>
        </tr>
	<tr>
	  <td> Math </td>
	  <td> <input id="submit" class="button" type="submit" value="Delete"> </td>
	</tr>
	<tr>
	  <td> Moth </td>
	  <td> <input id="submit" class="button" type="submit" value="Delete"> </td>
	</tr>
	</tbody>
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
      table = document.getElementById("subjectTable");
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

