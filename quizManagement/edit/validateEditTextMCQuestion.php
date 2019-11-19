<?php

$answer_elements = $_GET['last_answer_ndx'];
echo $answer_elements;


//print out the contents of the form
/*
for ($i=0; $i < $answer_elements; $i++){

	$answerText = 'answerText' . $i;
	$answerValidity = 'answerValidity' . $i;
	$deleteFlag = 'deleteFlag' . $i;

	//echo $answerText . " " . $answerValidity . " " . $deleteFlag;

	$row =  $_GET[$answerText] . " : " . $_GET[$answerValidity];
	$row .= " : " . $_GET[$deleteFlag] . "<br>";
	echo $row;
}
 */

//print out the questin text and point value
echo $_GET['questionText'];
echo $_GET['questionPoints'];
echo "<br>";



//print out only the form contents that
//have a deleteFlag set to false
for ($i=0; $i < $answer_elements; $i++){

	$answerText = 'answerText' . $i;
	$answerValidity = 'answerValidity' . $i;
	$deleteFlag = 'deleteFlag' . $i;
	

	if ($_GET[$deleteFlag]=="false"){	
	$row =  $_GET[$answerText] . " : " . $_GET[$answerValidity] . "<br>";
	echo $row;
	}
}




?>
