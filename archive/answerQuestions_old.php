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
    <title>Quiz Name</title>
  </head>
  <body>
    <h1 class="quizHeader">Quiz Name</h1>
    <div class="quiz-container">
      <div class="quizInformationContainer">
        <div class="quizInformation">
          <p id="info"> Quiz Name: </p>
        </div>
        <!--<div class="quizInformation">
          <p id="info"> Question 1 of 10: </p>
        </div>-->
      </div>
      <br>

      <div id="quiz">
<p>
<xmp>	
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

        #tracks the question number when displaying all questions
	$question_number = 1; #this should not be set here , it should be set at prequiz and incremented somewhere in this page - Matt
	$question_string= " ";
	#construct call to mysql procedure get_MC_Answers
                $query_answers = " call Asrcoo.get_possible_textAnswers(1); ";
                #prepare and execute msql procedure
                $qstans = $dbh->prepare($query_answers);
                $qstans->execute();

                $possible_answers_string = " ";

                #builds string to display all possible answers for the given question
                foreach($qstans->fetchAll() as $single_ans){
                        $possible_answers_string .= "<label>";
                        $possible_answers_string .= " <input type=\"radio\" name=questionNumber" . $question_number . "\" value=\"" . $single_ans['textAnswer_id'] . ">";
                        $possible_answers_string .= $single_ans['answer_text'];
                        $possible_answers_string .= "</label>";
                }
                echo $possible_answers_string;
?>
</xmp>
</p>
        <p id="mainQuestion">1. Central Jersery exists.</p>
          <label>
             <input type="radio" name="questionNumber" value="A">
              A. It doesn't.
        </label>
        <label>
             <input type="radio" name="questionNumber" value="B">
              B : It definitly doesn't.
        </label>
      </div>
      <br> <!-- Temporary -->
      <div>
        <button>Previous Question</button>
        <button>Next Question</button>
        <button>Submit Quiz</button>
      </div>
    </div>
  </body>
</html>
