<?php

//get the number of elements in the form list
//does not reflect the visible answers, but all
//of them including those that are "deleted" hidden
$answer_elements = $_GET['last_answer_ndx'];

//print out the questin text and point value
echo "Question :" . $_GET['questionText'];
echo "<br>";
echo "Points :" . $_GET['questionPoints'];
echo "<br>";

//get the correct answer ndx
$correct_ndx = $_GET['correctAnswer'];
echo "correct index :" . $correct_ndx;
echo "<br>";
//print out the correct answer contents
$correct_answer = 'answerText' . $correct_ndx;
echo "correct answer: " . $_GET[$correct_answer];
echo "<br>";



//print out only the form contents that
//have a deleteFlag set to false
echo "<br> all answer options <br> <br>";
for ($i=0; $i < $answer_elements; $i++){

	$answerText = 'answerText' . $i;
	$deleteFlag = 'deleteFlag' . $i;
	

	if ($_GET[$deleteFlag]=="false"){	
	$row =  $_GET[$answerText] . "<br>";
	echo $row;
	}
}

//note the addition of a quizQuestion can be wrapped in a function
//in a file we include on all create question calls
//the fucntion would return the generated question id
//and the independant procedure i.e cre...MC , SATA , FR would
//run afterwards.

//create a new question in the database with the current edit_quiz_id
//grab the curent quiz_id from the edit_quiz session variable
//for now use some test : quiz c : quiz_id = 3
$quiz_id = 3;
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
		if ($i==$GET['correctAnswer']){ //if the answer is correct specify 1 validity
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



?>
