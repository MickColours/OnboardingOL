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
    <div class="container" id="displayAnswerContainer">
	
      <div id="displayAnswer">

	<form action='validateCreateTextFRQuestion.php' method='get'> 

		<p class='info'><strong>Question Text: </strong>
		<textarea name='questionText' rows='5' cols='60'></textarea></p> 
      		<p class='info'><strong>Point Value: </strong>
		<input name='questionPoints' type='number' min='0' step='1'/> </p>
		<p class='info'><strong>Answer: </strong>
		<input name='answer' type='text'/> </p>
		<input id='createQuestion' class='button' type='submit' value='Submit'/>

      	</form>

     </div> 
      
    </div>


  </body>
</html>
