<?php
include '../../connections/connectEmployee.php';

$subject_id = $_GET["inspected_subject_id"];
$quiz_id = $_GET["inspected_quiz_id"];

$dbh = ConnectEmployee();

$query_string = " call Asrcoo.add_quiz_subject(:qid,:sid); ";
$stmt = $dbh->prepare($query_string);
$stmt->bindParam(':qid',$quiz_id, PDO::PARAM_STR);
$stmt->bindParam(':sid',$subject_id, PDO::PARAM_STR);
$stmt->execute();

//store success message in session variable
//$_SESSION['deletion_success_message']= $subject_name . " was successfully deleted";
//redirect user to the manageUser.php page
header("Location: /quizManagement/edit/editQuizSubjects.php");

?>
