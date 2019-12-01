<?php
session_start();

//get the number of elements in the form list
//does not reflect the visible answers, but all
//of them including those that are "deleted" hidden
$answer_elements = $_GET['last_answer_ndx'];


//note the addition of a quizQuestion can be wrapped in a function
//in a file we include on all create question calls
//the fucntion would return the generated question id
//and the independant procedure i.e cre...MC , SATA , FR would
//run afterwards.

//create a new question in the database with the current edit_quiz_id
//grab the curent quiz_id from the edit_quiz session variable
$quiz_id = $_SESSION['edit_quiz_id'];
$question = $_GET['questionText'];
$points = $_GET['questionPoints'];

//add the quizQuestion to the mysql database
//include the function create in connectUser.php
include '../../connections/connectEmployee.php';
#create database handler with employee level privilege

$dbh = ConnectEmployee();

#construct calls to Asrcoo.add_quizQuestion procedure
#to add all answer options

$query_string = " call Asrcoo.add_quizQuestion(:qid,:qtxt,:pts,'textMC');";
$stmt = $dbh->prepare($query_string);
#bind procedure paramaters
$stmt->bindParam(':qid', $quiz_id, PDO::PARAM_INT);
$stmt->bindParam(':qtxt', $question, PDO::PARAM_STR);
$stmt->bindParam(':pts', $points, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll();
$result = $result[0];
//store the resultant question id
$question_id = $result['thisQuestion_id'];

//add the answers 
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

header("Location: http://54.198.147.202/quizManagement/edit/editQuizOverview.php");

?>
