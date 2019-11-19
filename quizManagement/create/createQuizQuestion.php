<?php
session_start();
include '../../homepage/navBar.php';
?>

<html>
  <head>
    <title>AFMS Online Onboarding Learning Resource</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>

  <body>
    <div class="container" id="editQuizQuestionContainer">
      <h4 id='editQuestionHeader'>Create Question</h4>

      <p class='info'><strong>Question Text: </strong> <input type='text' name='question' id='editQuestionText'/> </p>
      <p class='info'><strong>Point Value: </strong> <input type='number' min="0" step="1"/> </p>
	
      <!-- Answer format -->      
      <div id="editQuestion">
      <?php
      include 'formatCreateQuizQuestion.php';
	//get the question type that was passed
	$question_type = $_GET['question_type'];

	if ($question_type=='textFR'){
		$answeroptions = formatNewTextFRAnswer();
	}
	//textSATA
	

	//textMC

      echo $answeroptions;
      ?>
      </div>

      <form action = ''> <!-- will redirect to code that adds the question and answer -->
	<input id='submit' class='button' type='submit' value='Submit'/>
      </form>
    </div>
  </body>
</html>
