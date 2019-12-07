<?php
session_start();
include '../../homepage/navBar.php';
?>

<!-- Author : Matt Date : 11/16

-->



<html>
  <head>
    <title>AFMS Online Onboarding Learning Resource</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>

  <body>
    <div class="container" id="addQuestionContainer">
      <h1 id='quizInfoHeader'>Create Free Response Question</h1>
	
      <div id="createTextFRQuestion">

<?php

        session_start();
        //get the edit quiz id
        $quiz_id = $_SESSION['edit_quiz_id'];
        //get question information from form
        $question_id = $_GET['question_id'];
        $question_text = $_GET['question_text'];
        $point_value = $_GET['point_value'];

        include '../../connections/connectEmployee.php';
        #create database handler with employee level privilege
        $dbh = ConnectEmployee();

	
        #construct calls to something to get the question's answers
        $query_string = " call Asrcoo.get_possible_textAnswers(:qid);";
        $stmt = $dbh->prepare($query_string);
        #bind procedure paramaters
        $stmt->bindParam(':qid', $question_id, PDO::PARAM_INT);
        $stmt->execute();
	$result = $stmt->fetchAll();
	$result = $result[0];
	$answerText = $result['answer_text'];
	$answerId = $result['textAnswer_id'];


        //format question inputs
        $question_string = "<p class='info'><strong>Question Text: </strong>";
        $question_string .= "<br><textarea  name='questionText' rows='5' cols='60'>" . $question_text . "</textarea></p>";
        $question_string .= "<p class='info'><strong>Point Value: </strong> ";
	$question_string .= "<input name='questionPoints' type='number' min='0' step='1' value='" .  $point_value  .   "'/> </p>";
	$question_string .= "<p class='info'><strong>Answer: </strong>";

	$answer_string .= "<input name='answerText' type='text' value='" . $answerText  ."'/> </p>";
	$answer_string .= "<input name='question_id' type='hidden' value='" . $question_id  ."'/> </p>";
	$answer_string .= "<input id='createQuestion' class='button' type='submit' value='Submit'/>";

?>
	
	<form action='validateEditTextFRQuestion.php' method='get'> 
		<?php 	
			echo $question_string; 
			echo $answer_string; 
		?>
			
	</form>

     </div> 
      
    </div>


  </body>
</html>
