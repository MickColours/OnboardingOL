<?php

//Author : Matt Date : 11/11
session_start();

//grade question

//add points

#$check_count = count($_GET['answer']);
#echo $check_count;

#grab question type and question id
$question_type = $_GET['question_type'];
$question_id = $_GET['question_id'];

#####################################
#Generate Answer String based on type
######################################


#if question type is SATA 
#generate commma separated answer string
#that consists of selected anwer_ids
if($question_type == 'textSATA'){ 
	$answer_string = "";

	foreach($_GET['answer'] as $selected){
	$answer_string .= $selected . "," ;
 	}
 #remove the last comma 
 $answer_string = substr($answer_string,0,-1); 
} 

#textMC
#grab the answer_id selected
elseif($question_type == 'textMC'){
	#answer string is just one value
	$answer_string = $_GET['answer'];
#assumed textFR
#set the answer string to the value provided
}else{
	#retrive the answer string and strip and leading
	#or trailing whitespace
	$answer_string= trim($_GET['answer']);
}

######################################
#Call grade procedure based on type
######################################


#grade the MC or SATA Question
#I.e. get the points awarded for this answer.
include '../connections/connectEmployee.php';
$dbh = connectEmployee();

if ($question_type == 'textSATA' or $question_type == 'textMC'){
	$query_string = " call Asrcoo.grade_fixed_textQuestion(:qid,:astr);";
}else {
	$query_string = " call Asrcoo.grade_unfixed_textQuestion(:qid,:astr);";
}
$sth = $dbh->prepare($query_string);
$sth->bindParam(':qid',  $question_id, PDO::PARAM_STR);
$sth->bindParam(':astr', $answer_string,PDO::PARAM_STR);
$sth->execute();

$result = $sth->fetchAll();
$result = $result[0]; #grab the first row
$points_awarded = $result['points_earned']; #grab the return value


#tests ...
#echo "Points Earned: " . $result;
#echo $question_id . " " . $question_type;
#echo "Answerstring : " .$answer_id_string;



//increment the score
$_SESSION['take_current_points']+=$points_awarded;

//increment question counter
$_SESSION['take_question_counter'] = $_SESSION['take_question_counter']+1;

if($_SESSION['take_question_counter'] != $_SESSION['take_number_of_questions']){

//in the future the execution of the script will
//bring the user to a page identicat to the one before
//but with there select filled with there answer choice
//in some way
//
//and the correct answer choice displayed below
//for sake of functionality it just grades the question
//and moves onto the next one
//

header("Location: http://54.198.147.202/takeQuiz/answerQuestions.php");
#will be changed later to redirect to a post quiz page
#where score is presented
}else{
	header("Location: http://54.198.147.202/takeQuiz/postQuiz.php");
}

?>
