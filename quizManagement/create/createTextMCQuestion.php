<?php
session_start();
include '../../homepage/navBar.php';
?>

<!-- Author : Matt Date : 11/16

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
    <div class="container" id="editQuizQuestionContainer">
      <h4 id='editQuestionHeader'>Create Question</h4>
	
      <!-- Answer format -->      
      <div id="createTextMCQuestion">
      <?php

	
	//format question inputs
	$question_string = "<p class='info'><strong>Question Text: </strong>";
	$question_string .= "<textarea name='questionText' rows='5' cols='60'>" . $question_mat['question_text'] . "</textarea> </p>"; 
      	$question_string .= "<p class='info'><strong>Point Value: </strong> ";
	$question_string .= "<input name='questionPoints' type='number' min='0' step='1' value='" .  $question_mat['points']  .   "'/> </p>";
	//format answer space	
	$answer_string= "<ol id='answer_list'></ol>";
	//hid an html tag that will hold an index for the answer
	$answer_string .= "<input type='hidden' name='last_answer_ndx' id='answer_ndx' value='0'>";
?>	

      </div>
      <form action='validateCreateTextMCQuestion.php' method='get'> <!-- will redirect to code that adds the question and answer -->
	<?php  
	echo $question_string;
	echo $answer_string;
	?>
	<input id='submit' class='button' type='submit' value='Submit'/>
      </form>
	<input type='button' value='add answer' onclick=addAnswer()>
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
		//parse as it
		answerndx = parseInt(answerndx);
		//add 1 to the hidden field where answerndx is stored
		document.getElementById('answer_ndx').value = answerndx+1;


		//create the new answer row
		var entry = document.createElement('li');
		entry.setAttribute('id','row'.concat(answerndx));
		var i0 = document.createElement("Label"); //input element, text Answer
		i0.innerHTML ="answer ";
	

		var i1 = document.createElement("input"); //input element, text Answer
		i1.setAttribute('type',"text");
		let i1name = 'answerText'.concat(answerndx); //create an indexable name
		i1.setAttribute('name',i1name);

		var i2 = document.createElement("Label"); //input element, text Answer label
		i2.innerHTML = "Validity"

		/*	
		var i3 = document.createElement("input"); //input element, text Validity
		i3.setAttribute('type',"text");
		let i3name = 'answerValidity'.concat(answerndx);
		i3.setAttribute('name',i3name);
		*/

		//validity above can possibly be replaced with radio buttons and whatever the other one is
		//below I try to replace above with radio inputs

		//in this setup we can get the selected radio option
		//from the name, the value returned is the answer marked true
		var i3 = document.createElement("input");
		i3.setAttribute('type','radio');
		i3.setAttribute('name','correctAnswer');
		i3.setAttribute('value',answerndx);

		//<input type="radio" name="gender" value="male"> Male<br>
		
		var i5 = document.createElement("button"); //delete button
		i5.setAttribute('type','button');
		var functionCall = "javascript: setDelete(".concat(answerndx);
		functionCall = functionCall.concat(");");
		i5.setAttribute("onclick",functionCall);
		i5.innerHTML="delete";

		var i6 = document.createElement("input"); //create the delete flag for the new element
		var flagid = 'deleteFlag'.concat(answerndx);
		let i6name = 'deleteFlag'.concat(answerndx);
		i6.setAttribute('id',flagid);
		i6.setAttribute('name',i6name);
		i6.setAttribute('type','hidden');
		i6.setAttribute('value','false');

		entry.appendChild(i0);
		entry.appendChild(i1);
		entry.appendChild(i2);
		entry.appendChild(i3);
		entry.appendChild(i5);
		entry.appendChild(i6);

		list.appendChild(entry);
	}

      
	</script>

  </body>
</html>
