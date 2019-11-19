<?php

//print out the questin text and point value
echo "Question : " . $_GET['questionText'];
echo "<br>";
echo "Points :" . $_GET['questionPoints'];
echo "<br>";


$answer_elements = $_GET['last_answer_ndx'];


//get the correct answer ndx
$correct_ndx_arr = $_GET['correctAnswer'];

foreach($correct_ndx_arr as $row){
	echo "correct index : " . $row . "---";
	$correct_answer = 'answerText' . $row;
	echo "correct answer : " . $_GET[$correct_answer];
	echo "<br>";
}


//print out only the form contents that
//have a deleteFlag set to false
for ($i=0; $i < $answer_elements; $i++){

	$answerText = 'answerText' . $i;
	$deleteFlag = 'deleteFlag' . $i;
	

	if ($_GET[$deleteFlag]=="false"){	
	$row =  $_GET[$answerText] . " : " . $_GET[$answerValidity] . "<br>";
	echo $row;
	}
}

//create a new question in the database with the current edit_quiz_id

?>
