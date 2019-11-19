<!-- allows data transfer through session -->
<?php 
#includes the HTML code for the navigation bar
include "../../homepage/navBar.php"; 
session_start();
?>

<!-- Author: Victor, Frank, Matt*    Date Created : ? -->

<html>
  <head>
    <title>Edit Quiz Overview | AFMS Online Onboarding Learning Resource</title>
    <!-- Links the CSS code -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>

  <body>
    <!-- creates a container that will display the contents of the page -->
    <div class="container">
      <h1 id="tableHeading">Quiz Overview</h1>
      <!-- creates a table that will display a list of quiz information an actionable buttons -->
      <table class="displayTable" id="quizTable">
	<tr>
	  <td class="none"></td>
	  <td class="none"></td>
	  <td class="none"></td>
	  <td class="none"></td>
	  <td class="none">
	    <!--<input type="button" value="Edit Quiz Information"></button>-->
	  </td>
        <tr id="headerRow"> 
	  <th>Order</th>
	  <th>Type</th>
	  <th>Question</th>
	  <th>Points</th>
	  <th></th>
	</tr>
	
	<?php

	include '../../connections/connectEmployee.php';
	session_start();

	$dbh = connectEmployee();


	//Logic to ensure the correct quiz data 
	//is being displayed
	//since the editQuizOverview has many entry points
	//Redirection from createQuizInfo, redirection from editQuiz listing
	//redirection from editQuiz operations ....
	// -Matt
	if ($_GET['inspected_quiz_id']!=null){ //we reached this page from
		//the editQuiz.php button therefore overwrite edit_quiz_id
		$_SESSION['edit_quiz_id']=$_GET['inspected_quiz_id'];
	}//otherwise we came here internally or from createQuizInfo.php
	$quiz_id = $_SESSION['edit_quiz_id'];
	
	
	$query_string = " call Asrcoo.get_quiz_questions(:qid) ";

	$sth = $dbh->prepare($query_string);
	$sth->bindParam(':qid', $quiz_id, PDO::PARAM_INT);
	$sth->execute();

	$table_string= " ";
	foreach($sth->fetchAll() as $row){
		$table_string .= "<tr>\n";
		$table_string .= "<td>" . $row['order'] ."</td>\n";
		if($row['question_type'] == 'textMC')
			$table_string .= "<td>MC</td>\n";
		elseif($row['question_type'] == 'textSATA')
			$table_string .= "<td>SATA</td>\n";
		elseif($row['question_type'] == 'textFR')
			$table_string .= "<td>FR</td>\n";
		$table_string .= "<td>" . $row['question_text'] ."</td>\n";
		$table_string .= "<td>" . $row['point_value'] ."</td>\n";
		$table_string .= "<td></td>\n";
                $table_string .= "</tr>\n";

	}

	echo $table_string;
?>
        <tr>
          <td class="none"></td>
          <td class="none"></td>
          <td class="none"></td>
          <td class="none"></td>
	  <td class="none">
	<!-- need to wrap this information in a form Matt -->
	<form action="http://54.198.147.202/quizManagement/create/createQuizQuestion.php" method="get">
            <input type='submit' value='Add Question'>
            <select name="question_type">
              <option value="textMC">Multiple Choice (text)</option>
              <option value="textSATA">Select All (text)</option>
              <option value = "textFR">Free Response (text)</option>
	    </select>
	</form>
        <form>
	    <input type="button" value="Edit Quiz Information"></button>
	</form>
          </td>
        </tr>	
      </table>
      <br>
      <form>
        <input type="button" value="Finish Edit" class="button" id="submitButton"/>
      </form>
    </div>

  </body>
</html>

