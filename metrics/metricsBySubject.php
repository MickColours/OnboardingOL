<?php
include '../homepage/navBar.php';
session_start();
?>
<html>
  <head>
    <title>Metrics By Subjects</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <body>
    <!-- creates a container that will display the contents of the page -->
    <div class="container" id="uploadFileBox">
      <h1 id="quizInfoHeader">Manage Subjects</h1><br>
    <table class="displayTable" id="subjectTable">
	<tbody>
        <tr id="headerRow">
          <th style="width:50%">Subject</th>
          <!-- <th>Author</th> As of now , the data relies on a query that assumes the user is the author
                ergo, author is not needed , may change in the future Matt -->
          <th>
            <!-- creates a tet box with the functionality of a search box -->
            <input type="text" id="searchBox" onkeyup="myFunction()" placeholder="Search Subjects">
          </th>
	</tr>
              

                <?php

                include '../connections/connectAdmin.php';
                session_start();

                $dbh = connectAdmin();

                $querystring = " call Asrcoo.list_subjects(); ";

                $sth = $dbh->prepare($querystring);
                $sth->execute();

                $tablestring= " ";
                foreach($sth->fetchAll() as $row){
                        $tablestring .= "<tr>\n";
                        $tablestring .= "<td>" . $row['name'] ."</td>\n";

                        //delete subject
                        $tablestring .= " <td>";
                        $tablestring .= " <form class='manageButton' action='http://54.198.147.202/metrics/subjectMetrics.php' method='get' name='view_subject_metrics'> ";
                        $tablestring .= " <input id='metricsButton' class='button' style='width:140px;' type='submit' value='View Subject Metrics'/> ";
                        $tablestring .= " <input type='hidden' id='inspected_subject_id' name='inspected_subject_id' value='" . $row['subject_id']  .   "'/>";
			$tablestring .= " <input type='hidden' id='inspected_subject_name' name='inspected_subject_name' value='" . $row['name']  .   "'/>";
			$tablestring .= " </form>";
                        $tablestring .= " </td>";

                        $tablestring .= " </tr>\n";
                }

                echo $tablestring;
                ?>

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
