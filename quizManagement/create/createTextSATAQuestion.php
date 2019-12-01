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
    <div class="container" id="addQuestionContainer">
      <h1 id='quizInfoHeader'>Create Multiple-Response Multiple Choice Question</h1>
	 
      <div id="createTextMCQuestion">

	<form action='validateCreateTextSATAQuestion.php' method='get'> 
	<!-- format question inputs -->
	<p class='info'><strong>Question Text: </strong>
	<textarea name='questionText' rows='5' cols='60'></textarea></p>
      	<p class='info'><strong>Point Value: </strong>
	<input name='questionPoints' type='number' min='0' step='1'/> </p>

	<!-- define list to store answer -->
	 <ol id='answer_list'></ol> 
	<!-- hide an index on the page to keep track of answer options -->
	<input type='hidden' name='last_answer_ndx' id='answer_ndx' value='0'>

	<!-- form sumbit -->
	<input id='createQuestion' class='button' type='submit' value='Submit'/>
      </form>

      </div>
	<!-- create new answer option -->
	<input id="createQuestion" type='submit' class="button" value='Add Answer' onclick=addAnswer()>
    </div>


	<script language="javascript">

	//given an ndx set the hidden delete field to true,and hide associated elements
	//!!!If delete does not remove the value from the list
	//we must set the answerValidity to unchecked this is critical for SATA
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

	

		var i3 = document.createElement("input"); //input element, text Validity
		i3.setAttribute('type',"checkbox");
		i3.setAttribute('name','correctAnswer[]'); //checkbox have unique names
		i3.setAttribute('value',answerndx);//will check if the value of each box is correct


		
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
		entry.appendChild(i3);
		entry.appendChild(i5);
		entry.appendChild(i6);

		list.appendChild(entry);
	}

      
	</script>

  </body>
</html>
