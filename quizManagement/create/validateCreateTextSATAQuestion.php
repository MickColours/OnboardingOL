<?php

session_start();

//get number of elements in list
$answer_elements = $_GET['last_answer_ndx'];


//get the correct answer ndx array
$correct_ndx_arr = $_GET['correctAnswer'];


//create a new question in the database with the current edit_quiz_id
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

$query_string = " call Asrcoo.add_quizQuestion(:qid,:qtxt,:pts,'textSATA');";
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
                if (in_array($i,$_GET['correctAnswer'])){ //if the answer is correct set validity 1
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
