<!DOCTYPE html>
<!-- 	AUTHORS : ? , Matt
	DATE CREATED : ?
-->

<?php

#redirect users who are not logged in
include '../accessControl/loggedIn.php';
Allowed();

session_start();

#includes the HTML code for the navigation bar
include '../homepage/navBar.php';


#load take variables .. Matt

#retrieve the current question index
$question_counter = $_SESSION['take_question_counter'];
#retrieve question matrix from session
$question_matrix = $_SESSION['take_question_matrix'];
#index the question matrix at the current question
$current_question = $question_matrix[$question_counter];
$question_text = $current_question['question_text'];
#get quiz id
$question_id = $_SESSION['take_quiz_id'];
#get quiz_name
$quiz_name = $_SESSION['take_name'];

?>

<html>
  <head>
    <title>AFMS Online Onboarding Learning Resource</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>

  <body>
    <div class="container" id="quizInfoContainer">
	<!-- inject quiz name -->
    <h1 id="quizInfoHeader"><?php echo $_SESSION['take_name']?></h1>
      <br>

	 <!-- display question 
		Matt
	-->	
	<div>
	<h1 class="question"> <?php echo "Question: " . ($question_counter+1) ; ?>  </h1>
		<p class="question"><?php echo $question_text; ?></p>
	</div>

      <div id="quiz">
	<?php
	include 'formatQuestions.php';
	#pass the current question row in the question matrix
	#to format the possible answers
	$answer_options = formatTextAnswers($current_question);
	echo $answer_options;
	?>
      </div>

    </div>

      
	

  </body>
</html>
