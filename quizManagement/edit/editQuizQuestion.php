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
      <h1 id='editQuestionHeader'>Edit Question</h1>
      <p class='info'><strong>Question Text: </strong> <input type='text' name='question' id='editQuestionText'/> </p>
      <p class='info'><strong>Point Value: </strong> <input type='number' min="0" step="1"/> </p>
      
      <div id="editQuestion">
      <?php
      include 'formatEditQuizQuestion.php';
      
      $answeroptions = formatEditQuizQuestion("textFR");
      echo $answeroptions;
      ?>
      </div>

      <form action = 'http://54.198.147.202/editQuizOverview.php'>
	<input id='submit' class='button' type='submit' value='Submit'/>
      </form>
    </div>
  </body>
</html>
