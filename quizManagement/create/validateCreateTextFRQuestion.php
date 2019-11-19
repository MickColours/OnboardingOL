<?php

$answer_elements = $_GET['last_answer_ndx'];


//print out the questin text and point value
echo $_GET['questionText'];
echo "<br>";
echo $_GET['questionPoints'];
echo "<br>";
echo $_GET['answer'];
echo "<br>";


//grab question text, trim leading and trailing whitespace
$question=$_GET['questionText'];

//grab point value, ensure it is integer, it should be
//based on the preceding html element
$points=$_GET['questionPoints'];

//grab answer , trim leading and trailing whitespace
$answer=$_GET['answer'];

//grab the curent quiz_id from the edit_quiz session variable
//for now use some test : quiz c : quiz_id = 3
$quiz_id = 3;


//add the quizQuestion to the mysql database
//include the function create in connectUser.php
include '../../connections/connectEmployee.php';
#create database handler with employee level privilege

$dbh = ConnectEmployee();

#construct call to Asrcoo.add_quizQuestion procedure
$query_string = " call Asrcoo.add_quizQuestion(:qid,:qtxt,:pts,'textFR');";
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


#construct call to Asrcoo.add_textAnswer
#add answer to the question_id returned from previous procedure call
$query_string = " call Asrcoo.add_textAnswer(:qid,:ans,1);";
$stmt = $dbh->prepare($query_string);
#bind procedure paramaters
$stmt->bindParam(':qid', $question_id, PDO::PARAM_INT);
$stmt->bindParam(':ans', $answer, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetchAll();


?>
