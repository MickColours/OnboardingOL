<?php
session_start();
include '../homepage/navBar.php';
?>

<html>
<head>
  <title>AFMS Online Onboarding Learning Resource</title>
   <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
  <body>
    <div class="container" id="quizInfoContainer">
    <h1 id='quizInfoHeader'>Add a Quiz</h1>

 <form action = 'http://54.198.147.202/quizManagement/create/validateCreateQuizInfo.php'>
    <p class='info'><strong>Quiz Name: </strong> <input type='text' name='quiz_name' id='quiz_name'>   </input>  </p>
    <p class='info'><strong>Description: </strong> <textarea name='quiz_description' id='quiz_description' rows="10" cols="20" class = 'descriptionTextBox'> </textarea>  </p>
    <p class='info'><strong>Time limit: </strong> <input type='text' name='quiz_time_limit' id='quiz_time_limit'>  </input>  </p>

	
   
      <input id='submit' class='button' type='submit' value='Create Quiz'/>
    </form>

   </div>
  </body>
</html>



