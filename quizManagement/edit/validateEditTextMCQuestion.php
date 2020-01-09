<?php
session_start();

$answer_elements = $_GET['last_answer_ndx'];

$quiz_id = $_SESSION['edit_quiz_id'];

$question_text = $_GET['questionText'];
$point_value = $_GET['questionPoints'];
$question_id = $_GET['question_id'];

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

//construct call to drop question answers
$query_string = " call Asrcoo.delete_textQuestion_answers(:qid);";
$stmt = $dbh->prepare($query_string);
#bind procedure paramaters
$stmt->bindParam(':qid', $question_id, PDO::PARAM_INT);
$stmt->execute();

//add the new answers 
for ($i=0; $i < $answer_elements; $i++){

	$answerTextKey = 'answerText' . $i;
	$deleteFlagKey = 'deleteFlag' . $i;
	
	//only add answers that weren't deleted
	if ($_GET[$deleteFlagKey]=="false"){	
		$answer =  $_GET[$answerTextKey]; //grab the answer value
		if ($i==$_GET['correctAnswer']){ //if the answer is correct specify 1 validity
			$validity = 1;
		}else{//else validity is 0
			$validity = 0;
		}
		#construct call to Asrcoo.add_textAnswer
		#add answer to the question_id returned from previous procedure call
		$query_string = " call Asrcoo.add_textAnswer(:qid,:ans,:val);";
		$stmt = $dbh->prepare($query_string);
		#bind procedure paramaters
		$stmt->bindParam(':qid', $question_id, PDO::PARAM_INT);
		$stmt->bindParam(':ans', $answer, PDO::PARAM_STR);
		$stmt->bindParam(':val', $validity, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetchAll();

	}
}

header("Location: /quizManagement/edit/editQuizOverview.php");

?>
