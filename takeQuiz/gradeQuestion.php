
<?php
include "../homepage/navBar.php";

//Author : Matt Date : 11/11
session_start();

//grade question

//add points

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


//increment the score
$_SESSION['take_current_points']+=$points_awarded;

//increment question counter
$_SESSION['take_question_counter'] = $_SESSION['take_question_counter']+1;


 #######################################
 #session time out
 #######################################

//if the user has exceeded the alotted quiz time redirect them to the take quiz page 
$stime = $_SESSION['quiz_start_time'];
$duration =  microtime(true) - $stime;
$duration = $duration / 60;
if ($duration > $_SESSION['take_time_limit']){
	//return to take quiz page
	header("Location: http://54.198.147.202/takeQuiz/takeQuiz.php");
}

#######################################
##code for displaying the correct answer
########################################
	
//format the correct answer
$query_string  = " call Asrcoo.get_correct_textAnswers(:qid); ";
$sth = $dbh->prepare($query_string);
$sth->bindParam(':qid',  $question_id, PDO::PARAM_INT);
$sth->execute();

$result =  $sth->fetchAll();

$correct_answer_string = "<p id='correctAnswerText'><strong>Correct Answer(s):</strong><br><br>";
foreach($result as $row){
	$correct_answer_string .= "&nbsp&nbsp&nbsp&nbsp" . $row['answer_text'] . "<br>";
}
$correct_answer_string .= "</p>";

 #######################################
 #user redirection dependant on remaining questions
 #######################################


//change form direction dependant if questions remain
if($_SESSION['take_question_counter'] != $_SESSION['take_number_of_questions']){
	$form_string = "<form method='get' action='answerQuestions.php'>";
	$form_string .= "<input id='nextQuestionSubmit' class='button' type='submit' style='width:100px; margin:12px 0px 12px 20px;' value='Next Question'/>";
}else{
	$form_string =  "<form method='get' action='postQuiz.php'>";
	$form_string .= "<input id='nextQuestionSubmit' class='button' type='submit' style='width:100px; margin:12px 0px 12px 20px;' value='View Results'/>";
}


if($points_awarded != 0){
 $result_string = "<h1 id='grade'>Correct Answer!</h1>";
 }else{
 $result_string = "<h1 id='badGrade'> Incorrect Answer.</h1>";
 }

$form_string .= "</form>";
$content = "<table> <div class='container' id='quizInfoContainer'> <h1 id='quizInfoHeader'>Answer</h1> " . $result_string . " " . $correct_answer_string . " " . $form_string . " </div> </table>";
echo $content; //display redirection link


/*
####################################################
#OLD METHOD , NO ANSWER DISPLAY , JUST REDIRECATION
####################################################

if($_SESSION['take_question_counter'] != $_SESSION['take_number_of_questions']){
header("Location: http://54.198.147.202/takeQuiz/answerQuestions.php");
#will be changed later to redirect to a post quiz page
#where score is presented
}else{
	header("Location: http://54.198.147.202/takeQuiz/postQuiz.php");
}

*/

?>








