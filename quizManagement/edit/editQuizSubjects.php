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
    <title>Edit Quiz Overview | AFMS Online Onboarding Learning Resource</title>
    <!-- Links the CSS code -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
<body>
<div class="container">

<!-- Subjects that are only in quiz -->
 <table class="displayTable" id="subjectTable">
        <tbody>
        <tr id="headerRow">
          <th style="width:40%">Current Quiz Subjects</th>
          <!-- <th>Author</th> As of now , the data relies on a query that assumes the user is the author
                ergo, author is not needed , may change in the future Matt -->
          <th>
            <!-- creates a tet box with the functionality of a search box -->
            <input type="text" id="searchBox" onkeyup="myFunction()" placeholder="Search Subjects">
          </th>
        </tr>

	<?php

        include '../../connections/connectEmployee.php';
        session_start();

        $dbh = connectEmployee();

	$quiz_id = $_SESSION['edit_quiz_id'];
	$querystring = " call Asrcoo.list_quiz_subjects(" . $quiz_id . "); ";

	        $sth = $dbh->prepare($querystring);
                $sth->execute();

                $tablestring= " ";
                foreach($sth->fetchAll() as $row){
                        $tablestring .= "<tr>\n";
                        $tablestring .= "<td>" . $row['name'] ."</td>\n";

                        //delete subject
                        $tablestring .= " <td>";
                        $tablestring .= " <form class='manageButton' action='http://54.198.147.202/quizManagement/edit/deleteSubjectFromQuiz.php' method='get' name='view_subject'> ";
                        $tablestring .= " <input id='deleteButton' class='button' type='submit' value='Delete'/> ";
                        $tablestring .= " <input type='hidden' id='inspected_subject_id' name='inspected_subject_id' value='" . $row['subject_id']  .   "'/>";
                        $tablestring .= " <input type='hidden' id='inspected_quiz_id' name='inspected_quiz_id' value='" . $quiz_id  .   "'/>";
                        $tablestring .= " </form>";
                        $tablestring .= " </td>";
                        $tablestring .= " </tr>\n";
                }
	echo $tablestring;
	?>

        </tbody>
      </table>
</div>

<div class="container">

<!-- All subjects -->
 <table class="displayTable" id="subjectTable">
        <tbody>
        <tr id="headerRow">
          <th style="width:40%">Subjects to Add</th>
          <!-- <th>Author</th> As of now , the data relies on a query that assumes the user is the author
                ergo, author is not needed , may change in the future Matt -->
          <th>
            <!-- creates a tet box with the functionality of a search box -->
            <input type="text" id="searchBox" onkeyup="myFunction()" placeholder="Search Subjects">
          </th>
        </tr>
      
                <?php

                include '../../connections/connectAdmin.php';
                session_start();

                $dbh = connectAdmin();		
		$quiz_id = $_SESSION['edit_quiz_id'];

                $querystring = " call Asrcoo.list_subjects(); ";

                $sth = $dbh->prepare($querystring);
                $sth->execute();

                $tablestring= " ";
		foreach($sth->fetchAll() as $row){
			
			$shoulddisplay = true;

			$dbh2 = connectEmployee();
			$querystring2 = " call Asrcoo.list_quiz_subjects(" . $quiz_id . "); ";

			$sth2 = $dbh2->prepare($querystring2);
			$sth2->execute();
			
			foreach($sth2->fetchAll() as $check){
				if($row['name'] == $check['name']) {
					$shoulddisplay = false;
				}
			}

			if($shoulddisplay) {
                        $tablestring .= "<tr>\n";
                        $tablestring .= "<td>" . $row['name'] ."</td>\n";

                        //delete subject
                        $tablestring .= " <td>";
                        $tablestring .= " <form class='manageButton' action='http://54.198.147.202/quizManagement/edit/addSubjectToQuiz.php' method='get' name='view_subject'> ";
                        $tablestring .= " <input id='deleteButton' class='button' type='submit' value='Add'/> ";
                        $tablestring .= " <input type='hidden' id='inspected_subject_id' name='inspected_subject_id' value='" . $row['subject_id']  .   "'/>";
                        $tablestring .= " <input type='hidden' id='inspected_quiz_id' name='inspected_quiz_id' value='" . $quiz_id  .   "'/>";
                        $tablestring .= " </form>";
                        $tablestring .= " </td>";

			$tablestring .= " </tr>\n";
			}
                }

                echo $tablestring;
                ?>


        </tbody>
      </table>
       

</div>
</body>
</html>
