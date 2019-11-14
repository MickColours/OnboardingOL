<?php

//author : Matt Date : 11/11
//	   Victor Date: 11/11

#redirect users who are not logged in
include '../accessControl/loggedIn.php';
Allowed();

session_start();

#includes the HTML code for the navigation bar
include '../homepage/navBar.php';

$earned = $_SESSION['take_current_points'];
$total = $_SESSION['take_total_points'];
$quiz_name = $_SESSION['take_name'];

#timing to be implemented
$elapsed_time = 12;

#calculate grade
$grade = ($earned / $total);
$grade = round($grade,2);
$percent_grade = ($grade*100);

#add performance to mysql db
include '../connections/connectEmployee.php';
$user_id = $_SESSION['user_id'];
$quiz_id = $_SESSION['take_quiz_id'];

$dbh = connectEmployee();

$query_string = " call Asrcoo.add_performance(:gra,:qid,:uid,:dur);";
$stmt = $dbh->prepare($query_string);
#bind param may be the problem
$stmt->bindParam(':gra', $grade, PDO::PARAM_STR);
$stmt->bindParam(':qid', $quiz_id, PDO::PARAM_STR);
$stmt->bindParam(':uid', $user_id, PDO::PARAM_STR);
$stmt->bindParam(':dur', $elapsed_time, PDO::PARAM_STR);
$stmt->execute();
?>

<!-- NTS: Double check the CSS -Victor -->
<html>
  <head>
    <title>Quiz Results | AFMS Online Onboarding Learning Resource</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <body>
    <div class="container" id="quizInfoContainer">
      <h1 id="quizResultHeader">Quiz Results</h1>
	
<?php
	$result_string = "";
	$result_string .= "<h3 id='gradeHeader'>Your result for this quiz is:</h3>\n";
	$result_string .= "<h1 id='grade'>" . $percent_grade ."%</h1>\n";
	$result_string .= "<br>\n";
	$result_string .= "<div class='quizInformation'><!-- intentionally left blank --></div>\n";
	$result_string .= "<div class='quizInformation'>\n";
	$result_string .= "<p class='info'><strong>Points Scored: </strong>" . $earned ."</p>\n";
	$result_string .= "</div>\n";
	$result_string .= "<div class='quizInformation'>\n";
	$result_string .= "<p class='info'><strong>Total Points Possible: </strong>" . $total ."</p>\n";
	$result_string .= "</div>\n";
	$result_string .= "<div class='quizInformation'>\n";
	$result_string .= "<p class='info'><strong>Elapsed Time: </strong>" . $elapsed_time ."</p>\n";
	$result_string .= "</div>\n";
	$result_string .= "<br>\n";

	echo $result_string;
?>
    </div>
  </body>

<?php 
unset($_SESSION['take_quiz_id']);
unset($_SESSION['take_name']);
unset($_SESSION['take_number_of_questions']);
unset($_SESSION['take_time_limit']);
unset($_SESSION['take_total_ponts']);
unset($_SESSION['take_question_counter']);
unset($_SESSION['take_current_points']);
unset($_SESSION['take_question_matrix']);
?>

</html>
