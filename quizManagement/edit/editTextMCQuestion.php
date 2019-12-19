<?php
session_start();
include '../../homepage/navBar.php';
?>

<!-- Author : Matt Date : 11/24

This mess of a file, tries to bridge together the content 
that is generated from pre existing data, with dynamic content
from the user. That is merging answer options that already exist
with new ones, with the ability to remove the prexisting and newly added
options

I had to take advantage of alot of javascript to manage the dynamic
creation of the form values

I had to use some hacky methods to name the form inputs in
a meaningful way

TODO: add a name to the inputs generated from the foreach loop
and concatenate them with the answer_ndx 

do the same for all elements generated from the javascript

Then in the submission of the form
I can systematically evaluate all elements created or destroyed
and decide what is to be removed,kept and updated

-->



<html>
  <head>
    <title>AFMS Online Onboarding Learning Resource</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>

  <body>
    <div class="container" id="addQuestionContainer">
      <h1 id='quizInfoHeader'>Edit Question</h1>
	
      <!-- Answer format -->      
      <div id="editQuestion">
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

	$answer_arr = $result;

	//format question inputs
	$question_string = "<p class='info'><strong>Question Text: </strong>";
	$question_string .= "<br><textarea  name='questionText' rows='5' cols='60'>" . $question_text . "</textarea></p>"; 
      	$question_string .= "<p class='info'><strong>Point Value: </strong> ";
	$question_string .= "<input name='questionPoints' type='number' min='0' step='1' value='" .  $point_value  .   "'/> </p>";

	//structure the answer space
	$answer_string= "<ol id='answer_list'>";
	//$answer_ndx is to keep track of how many answers have been pre-generated, i.e came from sql query
	$answer_ndx = 0;
	foreach($answer_arr as $row){
		$answer_string .= "<li id='row" . $answer_ndx . "'>";
	
		$answer_string .= "<label> Answer: </label>";
		//input answer
		$answer_string .= "<input type='text' name='answerText" . $answer_ndx . "' value='" . addslashes($row['answer_text'])  .  "'>";
		$answer_string .= "<input type='radio' name='correctAnswer' value='" . $answer_ndx . "'";
		//if the answer is valid make it the default checked option
		if($row['validity']==1){
			$answer_string .= " checked >";
		}else{
			$answer_string .= ">";
		}
		//input validity
		$answer_string .= "<input onclick=setDelete('" .  $answer_ndx . "') type='button' name='Delete'"; //call js with answerndx
		$answer_string .= "value='Delete' id='deleteBtn". $answer_ndx ."'> ";
		//input flag delete *indexed id necessary for js deletes
		$answer_string .= "<input type='hidden' name='deleteFlag". $answer_ndx . "' value='false' id='deleteFlag" . $answer_ndx . "'>";
		$answer_string .= "</li>";
		$answer_ndx = $answer_ndx + 1;
	}
	//echo out a hidden div with the current answer_ndx

		
	$answer_string .= "</ol>";
	$answer_string .= "<input type='hidden' name='last_answer_ndx' id='answer_ndx' value='" . $answer_ndx . "'>";
	$answer_string .= "<input type='hidden' name='question_id' id='question_id' value='" . $question_id . "'>";
?>	

      </div>
      <form action='validateEditTextMCQuestion.php' method='get'> <!-- will redirect to code that adds the question and answer -->
	<?php  
	echo $question_string;
	echo $answer_string;
	?>
	<input id='createQuestion' class='button' type='submit' value='Submit'/>
      </form>
	<input id="createQuestion" class="button" type='button' value='Add Answer' onclick=addAnswer()>
    </div>


	<script language="javascript">

	//given an ndx set the hidden delete field to true,and hide associated elements
	function setDelete(delete_ndx) {
		let deleteFlag_id = "deleteFlag".concat(delete_ndx);
		//flag the answer to be delete
		document.getElementById(deleteFlag_id).setAttribute('value',true);
		//set the list index to be invisible //correct answers are posted, but not hidden 
		document.getElementById("answer_list").children[delete_ndx].style.display="none";
	}

	//dynamically add new html inputs
	//wire deletes to the buttons
	//reference the last used index from the answers
	//pregenerated (will be useful when it comes to "editQuestion" functionality
	function addAnswer(){
		var list = document.getElementById('answer_list');

		//get the index for the next answer
		var answerndx = document.getElementById('answer_ndx').value;
		//parse as int
		answerndx = parseInt(answerndx);
		//add 1 to the hidden field where answerndx is stored
		document.getElementById('answer_ndx').value = answerndx+1;


		//create the new answer row
		var entry = document.createElement('li');
		entry.setAttribute('id','row'.concat(answerndx));
		var i0 = document.createElement("Label"); //input element, text Answer
		i0.innerHTML ="Answer: ";
	

		var i1 = document.createElement("input"); //input element, text Answer
		i1.setAttribute('type',"text");
		let i1name = 'answerText'.concat(answerndx); //create an indexable name
		i1.setAttribute('name',i1name);

		var i3 = document.createElement("input");
                i3.setAttribute('type','radio');
                i3.setAttribute('name','correctAnswer');
                i3.setAttribute('value',answerndx);	


		var i5 = document.createElement("button"); //delete button
		i5.setAttribute('type','button');
		var functionCall = "javascript: setDelete(".concat(answerndx);
		functionCall = functionCall.concat(");");
		i5.setAttribute("onclick",functionCall);
		i5.innerHTML="Delete";

		var i6 = document.createElement("input"); //create the delete flag for the new element
		var flagid = 'deleteFlag'.concat(answerndx);
		let i6name = 'deleteFlag'.concat(answerndx);
		i6.setAttribute('id',flagid);
		i6.setAttribute('name',i6name);
		i6.setAttribute('type','hidden');
		i6.setAttribute('value','false');

		entry.appendChild(i0);
		entry.appendChild(i1);
		entry.appendChild(i3);
		entry.appendChild(i5);
		entry.appendChild(i6);

		list.appendChild(entry);
	}

      
	</script>

  </body>
</html>
