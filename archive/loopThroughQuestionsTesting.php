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

        #tracks the question number when displaying all questions
	#$question_number = 1; #this should not be set here , it should be set at prequiz and incremented somewhere in this page - Matt

	#construct call to mysql procedure get_MC_Answers
                $query_answers = " call Asrcoo.get_possible_textAnswers(1) ";
                #prepare and execute msql procedure
                $qstans = $dbh->prepare($query_answers);
                $qstans->execute();

                $possible_answers_string = " ";

                #builds string to display all possible answers for the given question
                foreach($qstans->fetchAll() as $row){
                       $possible_answers_string .= "<label class='possibleAnswer'>\n";
			$possible_answers_string .= "<input type='radio' name='questionNumber' id='mcOption' value='" . $row['textAnswer_id'] ."'>\n";
			$possible_answers_string .= " " . $row['answer_text'] ."\n";
			$possible_answers_string .= "</label>\n";
                }
                echo $possible_answers_string;
?>
      </div>
    </div>
  </body>
</html>
