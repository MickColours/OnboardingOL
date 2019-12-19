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
    <h1 id='quizInfoHeader'>Edit a Quiz</h1>

	<?php
	
	include '../../connections/connectEmployee.php';
	session_start();
	
	$quiz_id = $_SESSION['edit_quiz_id'];

        $dbh = connectEmployee();

	$query_string = " call Asrcoo.get_quiz_detail(:qid); ";

	$sth = $dbh->prepare($query_string);
	$sth->bindParam(':qid', $quiz_id, PDO::PARAM_INT);
        $sth->execute();

	$result = $sth->fetchAll();
	$result = $result[0];

	$name_string = $result['name'];
	$description_string =  $result['description'];
	$time_limit_string =  $result['time_limit'];


	$form_string = "<form method='get' action='validateEditQuizInfo.php'>";
	$form_string .= "<p class='info'><strong>Quiz Name: </strong> <input type='text' name='quiz_name' id='quiz_name' value='" .  $name_string  .  "'></p>";
	$form_string .= "<p class='info'><strong>Description: </strong>";
	$form_string .= "<br><textarea name='quiz_description'  id='quiz_description' rows='10' cols='50' class = 'descriptionTextBox'>";
	$form_string .= $description_string ."</textarea></p>";
 	$form_string .= "<p class='info'><strong>Time limit in minutes: </strong> <input type='text' name='quiz_time_limit' value='" . $time_limit_string  ."' id='quiz_time_limit'></p>";
    	$form_string .= "<input style='padding:5px 80px 5px 5px;' id='createQuizButton' class='button' type='submit' value='Submit Edits'/>";
	$form_string .= "</form>";
	echo $form_string;
	?>

   </div>
  </body>
</html>



