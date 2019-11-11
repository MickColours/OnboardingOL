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

#if question type is SATA 
#generate commma separated answer string
if($question_type == 'textSATA'){ 
 $answer_id_string = "";
 foreach($_GET['answer'] as $selected){
	$answer_id_string .= $selected . "," ;
 }
} 

#textMC
else{
	$answer_id_string = $_GET['answer'];
	$answer_id_string = substr($answer_id_string,-1);
}



echo $question_id . " " . $question_type;
echo $answer_id_string;

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


#header("Location: http://54.198.147.202/takeQuiz/answerQuestions.php");

#will be changed later to redirect to a post quiz page
#where score is presented
}else{
	#header("Location: http://54.198.147.202/takeQuiz/postQuiz.php");
}

?>
