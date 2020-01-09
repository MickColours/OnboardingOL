<?php
//Author: Matt Date: 11/24/2019


session_start();
include '../../connections/connectEmployee.php';
	
$quiz_id = $_SESSION['edit_quiz_id'];
$name = $_GET['quiz_name'];
$description = $_GET['quiz_description'];
$time_limit = $_GET['quiz_time_limit'];

//we should check to see if the contents are any different
//on the previous page, but this is fine for now 



$dbh = connectEmployee();
$query_string = " call Asrcoo.edit_quiz_detail(:qid,:nam,:des,:tim); ";
$sth = $dbh->prepare($query_string);
$sth->bindParam(':qid', $quiz_id, PDO::PARAM_INT);
$sth->bindParam(':nam', $name, PDO::PARAM_STR);
$sth->bindParam(':des', $description, PDO::PARAM_STR);
$sth->bindParam(':tim', $time_limit, PDO::PARAM_INT);
$sth->execute();

//return to editQuizOverview
header("Location: /quizManagement/edit/editQuizOverview.php");

?>



