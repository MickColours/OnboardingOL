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
    <div class="container" id="addQuizInfoContainer">
    <h1 id='quizInfoHeader'>Create a Subject</h1>

 <form action = '/quizManagement/subjects/validateCreateSubject.php'>
    <p class='info'><strong>Subject Name: </strong> <input type='text' name='subject_name' id='subject_name'>   </input>  </p>

      <input id='submitButton' class='button' type='submit' value='Create'/>
    </form>

   </div>
  </body>
</html>

