<?php
include "../homepage/navBar.php";
session_start();
?>
<html> <!-- Author : ?
		Date Created : ? -->
  <head>
    <title>AFMS Online Onboarding Learning Resource</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <body>
    <div class="container">
      <h1 id="tableHeading">Quiz Information</h1>
	<div class="container" id="quizInfoContainer">
	  <h1 id="quizInfoHeader">Quiz Name</h1>

	  <div class="quizInformation">
	    <p class="info"><strong>Quiz Name:</strong>{quizName}</p>
	  </div>
	  <div class="quizInformation">
	    <p class="info"><strong>Quiz Author:</strong>{quizAuthor}</p>
	  </div>
	  <div class="quizInformation">
	    <p class="info"><strong>Description:</strong>{desc}</p>
	  </div>
	  <div class="quizInformation">
	    <p class="info"><strong>Number of Questions:</strong>{#}</p>
	  </div>

<!--    Just testing something out htere -Vic 
      <table class="displayTable">
	<tr id="headerRow">
	  <th>Quiz Name</th>
	  <th>Quiz Author</th>
	  <th>Description</th>
	  <th># of Questions</th>
	</tr>

	<?php
	$inspected_quiz_id = $_GET['inspected_quiz_id'];
	$inspected_quiz_name = $_GET['inspected_user_name'];

	$table_string = " ";
	$table_string .= "<td>" . $row['$inspected_quiz_name'] ."</td>\n";
	$table_string .= "<td>" . $row['author'] ."</td>\n";
	
	echo $table_string;
	?>
      </table> -->

      <br><br>
      <form action='http://54.198.147.202/takeQuiz/takeQuiz.php'>
      <input id = "cancelButton" class='button' type="submit" value="Cancel"/>
      </form>
      <input class = "button" type = "submit" value = "Take Quiz" id = "submitButton"/>
    </div>
  </body>
</html>
