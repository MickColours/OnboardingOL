<?php

//Author : Matt Date: 11/11

//Load quiz specific variables into the session
//to be referenced during the execution of answerQuestions
session_start();
include '../connections/connectEmployee.php';


#load form data
$current_quiz_id = $_GET['inspected_quiz_id'];
$current_quiz_name = $_GET['inspected_quiz_name'];
$current_quiz_number_of_questions = $_GET['inspected_number_of_questions'];
$current_quiz_time_limit = $_GET['inspected_time_limit'];
$current_quiz_total_points = $_GET['inspected_total_points'];

#get mysql pdo
$dbh = connectEmployee();
 #construct query to call the get_quiz_questions procedure
$query_string = " call Asrcoo.get_quiz_questions($current_quiz_id); ";
#prepare and execute mysql procedure
$sth = $dbh->prepare($query_string);
$sth->execute();
$result = $sth->fetchAll();


#SHOULD MAKE SURE TO UNSET THESE VALUES
#BEFORE WE SET THEM TO CLEAR THE LAST QUIZ BUFFER



$_SESSION['take_quiz_id'] = $current_quiz_id;
$_SESSION['take_name'] = $current_quiz_name;
$_SESSION['take_number_of_questions'] = $current_quiz_number_of_questions;
$_SESSION['take_time_limit'] = $current_quiz_time_limit;
$_SESSION['take_total_points'] = $current_quiz_total_points;
$_SESSION['take_question_counter']=0;
$_SESSION['take_current_points']=0;
$_SESSION['take_question_matrix'] = $result;

header("Location: http://54.198.147.202/takeQuiz/answerQuestions.php");



?>
