<!DOCTYPE html>
<!-- 	AUTHOR : ?
	DATE CREATED : ?
-->

<?php

#redirect users who are not logged in
include '../accessControl/loggedIn.php';
Allowed();

#includes the HTML code for the navigation bar
include '../homepage/navBar.php';
?>

<html>
  <head>
    <title>AFMS Online Onboarding Learning Resource</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>

  <body>
    <div class="container" id="quizInfoContainer">
      <h1 id="quizInfoHeader">Quiz Name</h1>
      <br>

      <div id="quiz">
	<?php
        //import connectEmployee() function
        include '../connections/connectEmployee.php';
        session_start();

        #get mysql pdo
	$dbh = connectEmployee();

        #construct query to call the get_quiz_questions procedure
        $query_string = " call Asrcoo.get_quiz_questions(1); ";
        #prepare and execute mysql procedure
        $sth = $dbh->prepare($query_string);
	$sth->execute();
	$question_string = " ";
	$query_answers = " call Asrcoo.get_possible_textAnswers(1)";
	#$qstans = $dbh->prepare($query_answers);
	#$qstans->execute();


	#Should not be numbering questions based on their question_id. Quiz 2 has questions that start
	#with a question_id of 5. -Victor
	foreach($sth->fetchAll() as $row){
		$question_string .= "<div class='questionContainer'>\n";
		$question_string .= "<p id='question'>" . $row['question_id'] .". " . $row['question_text'] ."</p>\n";
		$question_string .= "<br>\n";
	


        #tracks the question number when displaying all questions
	#$question_number = 1; #this should not be set here , it should be set at prequiz and incremented somewhere in this page - Matt

	#construct call to mysql procedure get_MC_Answers
		$query_answers = " call Asrcoo.get_possible_textAnswers(" . $row['question_id'] .") ";
                #prepare and execute msql procedure
                $qstans = $dbh->prepare($query_answers);
		$qstans->execute();

		$possible_answers_string = " ";

		#THESE ARE ALL MY STUPID PRINT STATEMENTS - Chris
		#echo "<p>" . $row['question_id'] . "</p>";
		#$testrow = $qstans->fetchAll();
		#echo "<p>" . $testrow['answer_text'] . "yuh</p>";
		#--------------------

                #builds string to display all possible answers for the given question
		foreach($qstans->fetchAll() as $ansrow){ #NOT EXECUTING FOR FIRST QUESTION - might have something to do with the arrays in $qstans
			$possible_answers_string .= "<label class='possibleAnswer'>\n";
			$possible_answers_string .= "<input type='radio' name='questionNumber' id='mcOption' value='" . $ansrow['textAnswer_id'] ."'>\n";
			$possible_answers_string .= " " . $ansrow['answer_text'] ."\n";
			$possible_answers_string .= "</label>\n";
		}
		$question_string .= $possible_answers_string;
		$question_string .= "</div>\n";
		$question_string .= "<br>\n";
	}
	echo $question_string;
?>
      </div>
    </div>
  </body>
</html>
