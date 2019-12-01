<?php
session_start();

$quiz_id = $_SESSION['edit_quiz_id'];

$question_id = $_GET['question_id'];
$question_text = $_GET['questionText'];
$point_value = $_GET['questionPoints'];
$question_id = $_GET['question_id'];
$answerText = $_GET['answerText'];

//include the function created in connectEmployee. 
include '../../connections/connectEmployee.php';
#create database handler with employee level privilege
$dbh = ConnectEmployee();

//construct call to procedure to edit QuestionInfo
$query_string = " call Asrcoo.edit_question_detail(:qid,:qtxt,:pts);";
$stmt = $dbh->prepare($query_string);
#bind procedure paramaters
$stmt->bindParam(':qid', $question_id, PDO::PARAM_INT);
$stmt->bindParam(':qtxt', $question_text, PDO::PARAM_STR);
$stmt->bindParam(':pts', $point_value, PDO::PARAM_INT);
$stmt->execute();

//construct call to drop question answer
$query_string = " call Asrcoo.delete_textQuestion_answers(:qid);";
$stmt = $dbh->prepare($query_string);
#bind procedure paramaters
$stmt->bindParam(':qid', $question_id, PDO::PARAM_INT);
$stmt->execute();

//add the new answer
#construct call to Asrcoo.add_textAnswer
#add answer to the question_id returned from previous procedure call
$validity = 1;
$query_string = " call Asrcoo.add_textAnswer(:qid,:ans,:val);";
$stmt = $dbh->prepare($query_string);
#bind procedure paramaters
$stmt->bindParam(':qid', $question_id, PDO::PARAM_INT);
$stmt->bindParam(':ans', $answerText, PDO::PARAM_STR);
$stmt->bindParam(':val', $validity, PDO::PARAM_INT);
$stmt->execute();

header("Location: http://54.198.147.202/quizManagement/edit/editQuizOverview.php");

?>
