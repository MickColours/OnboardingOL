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
<?php
  $name=$_SESSION['edit_quiz_name'];
  $header_string = "<h1 id='tableHeading'>" . $name ."</h1>\n";
  echo $header_string;
?>
      <!-- creates a table that will display a list of quiz information an actionable buttons -->
      <table class="displayTable" id="quizTable">
	<!--<tr>
	  <td class="none"></td>
	  <td class="none"></td>
	  <td class="none"></td>
	  <td class="none"></td>
	<td class='none'></td> 
	<td class='none'></td>
	<td class='none'></td>
	  <td class="none">
	    <input type="button" value="Edit Quiz Information"></button>
	  </td>
	-->
        <tr id="headerRow"> 
	  <th style="width:5%;">Order</th>
	  <th style="width:10%;">Type</th>
	  <th style="width:50%;">Question</th>
	  <th style="width:5%;">Points</th>
	  <th style="width:25%; border-right-style:none;"></th>
	  <th style="width:5%; border-left-style:none;"></th> 
	</tr>
	
	<?php

	include '../../connections/connectEmployee.php';
	session_start();

	$dbh = connectEmployee();

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

		//edit
		$table_string .= "<td>";
		$table_string .= "<form class='manageButton' method='get' action='";
		//change edit action on type
		if($row['question_type'] == 'textMC')
			$table_string .= "editTextMCQuestion.php";
		elseif($row['question_type'] == 'textSATA')
			$table_string .= "editTextSATAQuestion.php";
		elseif($row['question_type'] == 'textFR')
			$table_string .= "editTextFRQuestion.php";
		else
			$table_string .= "";
		$table_string .= "'>";
		
		$table_string .= "<input type='hidden' name='question_id' value='" .  $row['question_id'] . "'>\n"; 
		$table_string .= "<input type='hidden' name='question_text' value='" .  $row['question_text'] . "'>\n";
		$table_string .= "<input type='hidden' name='point_value' value='" .  $row['point_value'] . "'>\n";
		$table_string .= "<input type='submit' class='button' value='Edit'>";
		$table_string .= "</form>";

		#delete questions
		$table_string .= "<form class='manageButton' action='deleteQuizQuestion.php' method='get'>";
		$table_string .= "<input type='hidden' name='question_id' value='" .  $row['question_id'] . "'>\n";
		$table_string .= "<input type='submit' class='button' value='Delete'>";
		$table_string .= "</form>";
		
		//view
		/*
		$table_string .= "<form class='manageButton' action='' method='get'>";
		$table_string .= "<input type='hidden' value='" .  $row['question_id'] . "'>\n"; 
		$table_string .= "<input type='submit' class='button' value='view'>";
		$table_string .= "</form>";
		$table_string .= "</td>\n";
		*/

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
	  <td class="none"></td>
	  <td class="none"><!-- column for add -->
	<!-- need to wrap this information in a form Matt -->
        <form id="selectQtype" name="selectQtype" action="http://54.198.147.202/quizManagement/create/createTextMCQuestion.php" method="get">
            <select name="question_type" id="question_type" onChange="chgAction()">
              <option value="textMC">Multiple Choice (text)</option>
              <option value="textSATA">Select All (text)</option>
              <option value = "textFR">Free Response (text)</option>
            <input type='submit' value='Add Question'>
            </select>
	</form>

        <form action='http://54.198.147.202/quizManagement/edit/editQuizInfo.php'>
	    <input type="submit" value="Edit Quiz Information"></button>
	</form>
	 <form action='http://54.198.147.202/quizManagement/edit/editQuizSubjects.php'>
            <input type="submit" value="Edit Quiz Subjects"></button>
        </form>
          </td>
        </tr>	
      </table>
      <br>
	
	<!--
      <form>
        <input type="button" value="Finish Edit" class="button" id="submitButton"/>
      </form>
	-->
    </div>

  </body>
</html>

<script>

function chgAction(){
  var form = document.getElementById('selectQtype');

  console.log('chgAction()');
  console.log(form.question_type.selectedIndex);

  switch (form.question_type.selectedIndex) {
    case 0:
       form.setAttribute('action',"http://54.198.147.202/quizManagement/create/createTextSATAQuestion.php");
    case 1:
      form.setAttribute('action',"http://54.198.147.202/quizManagement/create/createTextSATAQuestion.php");
      break;
    case 2:
      form.setAttribute('action',"http://54.198.147.202/quizManagement/create/createTextFRQuestion.php");
      break;
  }
}
</script>

