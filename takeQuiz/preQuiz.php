<?php
include "../homepage/navBar.php";
session_start();
?>
<html>

<!-- Author : Victor ?
	Date : ? 
-->

  <head>
    <title>AFMS Online Onboarding Learning Resource</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <body>
    <div class="container">
      <h1 id="tableHeading">Quiz Information</h1>
	<div class="container" id="quizInfoContainer">

<?php
$inspected_quiz_name = $_GET['inspected_quiz_name'];
$inspected_quiz_id = $_GET['inspected_quiz_id'];

include '../connections/connectEmployee.php';
session_start();
$dbh = connectEmployee();

#I'm uncertain, but I believe passing the inspected_quiz_id in this manner
#is not as secure as using bind_param from PHP PDO since this
#can enforce type checking and data restraints to prevent
#from my sql injection attack 
#
#This is functional, but is inconsistent with previous methodology.
#- Matt
$query_string = " call Asrcoo.get_quiz_detail('$inspected_quiz_id') ";

$sth = $dbh->prepare($query_string);
$sth->execute();

foreach($sth->fetchAll() as $row){

	$info_string .="<h1 id='quizInfoHeader'>$inspected_quiz_name</h1>\n";
	$info_string .= "<div class='quizInformation'>\n";
	$info_string .= "<p class='info'><strong>Quiz Name: </strong>$inspected_quiz_name</p>\n";
	$info_string .= "</div>\n";
	$info_string .= "<div class='quizInformation'>\n";
	$info_string .= "<p class='info'><strong>Quiz Author: </strong>" . $row['author'] ."</p>\n";
	$info_string .= "</div>\n";
	$info_string .= "<div class='quizInformation'>\n";
	$info_string .= "<p class='info'><strong>Date Created: </strong>" . $row['date_created'] ."</p>\n";
	$info_string .= "</div>\n";
	$info_string .= "<div class='quizInformation'>\n";
	$info_string .= "<p class='info'><strong>Time Limit: </strong>" . $row['time_limit'] ."</p>\n";
	$info_string .= "</div>\n";
	$info_string .= "<div class='quizInformation'>\n";
	$info_string .= "<p class='info'><strong>Description: </strong>" . $row['description'] ."</p>\n";
	$info_string .= "</div>\n";
	$info_string .= "<div class='quizInformation'>\n";
	$info_string .= "<p class='info'><strong>Number of Questions: </strong>" . $row['number_of_questions'] ."</p>\n";
	$info_string .= "</div>\n";
	$info_string .= "<div class='quizInformation'>\n";
	$info_string .= "<p class='info'><strong>Total Points: </strong>" . $row['total_points'] ."</p>\n";
	$info_string .= "</div>\n";
	$info_string .= " <td>";
        $info_string .= " <form action='http://54.198.147.202/takeQuiz/loadQuiz.php' method='get' name='view_quiz'> ";
	$info_string .= " <input id='submitButton' class='button' type='submit' value='Take Quiz'/> ";

	$info_string .= " <input type='hidden' id='inspected_quiz_name' name='inspected_quiz_name' value='" . $row['name'] . "'/>";
        $info_string .= " <input type='hidden' id='inspected_author_name' name='inspected_author_name' value='" . $row['author'] . "'/>";
	$info_string .= " <input type='hidden' id='inspected_date_created' name='inspected_date_created' value='" . $row['date_created']  .   "'/>";
	$info_string .= " <input type='hidden' id='inspected_time_limit' name='inspected_time_limit' value='" . $row['time_limit']  .   "'/>";
	$info_string .= " <input type='hidden' id='inspected_quiz_id' name='inspected_quiz_id' value='" . $inspected_quiz_id  .   "'/>";
        $info_string .= " <input type='hidden' id='inspected_number_of_questions' name='inspected_number_of_questions' value='" . $row['number_of_questions']  .  "'/>";
	$info_string .= " <input type='hidden' id='inspected_total_points' name='inspected_total_points' value='" . $row['total_points']  .   "'/>";

        $info_string .= " </form>";
        $info_string .= " </td>" ;

}

echo $info_string;
?>

<!-- The prequiz page acts as a preparation for the quiz taking experience
	On the submission of this form we need to store the
	quiz_id , number_of_questions, total_points, time_limit, and name
	as hidden values so we can pass them to a script that plugs these values into 
	the PHP Session.
	Instead of having the form action be take a quiz we should do something 
	similar to triggering a loadQuiz.php script that then loads these values into
	the session, then header to the actual quiz taking page.
		Matt
-->

      
      <form action='http://54.198.147.202/takeQuiz/takeQuiz.php'>
      <input id = "cancelButton" class='button' type="submit" value="Cancel"/>
      </form>
    </div>
  </body>
</html>
