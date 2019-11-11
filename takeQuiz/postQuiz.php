<?php

//author : Matt Date : 11/11
//	   Victor Date: 11/11

#redirect users who are not logged in
include '../accessCcontrol/loggedIn.php';
Allowed();

session_start();

#includes the HTML code for the navigation bar
include '../homepage/navBar.php';


unset($_SESSION['take_quiz_id']);
unset($_SESSION['take_name']);
unset($_SESSION['take_number_of_questions']);
unset($_SESSION['take_time_limit']);
unset($_SESSION['take_total_ponts']);
unset($_SESSION['take question_counter']);
unset($_SESSION['take_current_points']);
unset($_SESSION['take_question_matrix']);

/* Do not know if you plan on using this so I will comment out for now,
$results = " <div> ";
$results .= " Quiz Complete \n ";
$results .= " Score : ";
$results .= " </div>";
echo $results
 */
?>

<html>
  <head>
    <title>Quiz Results | AFMS Online Onboarding Learning Resource</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <body>
     
  </body>
