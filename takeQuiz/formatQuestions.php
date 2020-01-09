<?php

//Authors: Victor , Matt
//edits (Matt) wrapped code in php function
//restructured how question elements were being retrieved
//through passing quiz question row
//fixed logic error
//wrapped question box in form , connected to gradeQuestion.php


/*  On answerQuestions I've loaded the question 
 *  text coupled with  question index
 *  It may be better to do this here,
 *  but for now it works on the previous page.
 	-Matt 
 */


//param: $question_row : a row in take_quiz_matrix -> 
//('question_id:'xx','question_text':'yy','DTYPE':'zz')
function formatTextAnswers($question_row) {
 
 include '../connections/connectEmployee.php';
 $dbh = connectEmployee();
 $question_ID = $question_row['question_id'];

//format answer options

 $query_answers = " call Asrcoo.get_possible_textAnswers($question_ID) ";
 $ans = $dbh->prepare($query_answers);
 $ans->execute();
 
 $possible_answer_string = " <div class='answerContainer'>\n";
 $possible_answer_string .= "<form action='gradeQuestion.php' method='get' name='answerBox'>";

 if($question_row['question_type'] == 'textMC'){
	
	 foreach($ans->fetchAll() as $ansRow){
		
		 $possible_answer_string .= "<label class='possibleAnswer'>\n";
		 $possible_answer_string .= "<br>\n";
		$possible_answer_string .= "<input type='radio' name='answer' id='mcOption' value='" . $ansRow['textAnswer_id'] . "'/>\n";
		$possible_answer_string .= " " . $ansRow['answer_text'] ."\n";
		#pass question information
		$possible_answer_string .= "<input type='hidden' id='question_id' name='question_id' value='" . $question_row['question_id'] ."'/>";
                $possible_answer_string .= "<input type='hidden' id='question_type' name='question_type' value='" . $question_row['question_type'] . "'/>";
                $possible_answer_string .= "<input type='hidden' id='question_text' name='question_text' value ='" . $question_row['question_text'] . "'/>";

		$possible_answer_string .= "</label>\n";
	 }
 } elseif($question_row['question_type'] == 'textSATA'){
	 $possible_answer_string .= "<form action='gradeFixedTextQuestion.php' method='get' name='answerBox'>";

	 foreach($ans->fetchAll() as $ansRow){
	 
		$possible_answer_string .= "<label class='possibleAnswer'>\n";
		$possible_answer_string .= "<input type='checkbox' name='answer[]' id='mcOption' value='" . $ansRow['textAnswer_id'] . "'/>\n";
		$possible_answer_string .= " " . $ansRow['answer_text'] ."\n";
		#pass question information
		$possible_answer_string .= "<input type='hidden' id='question_id' name='question_id' value='" . $question_row['question_id'] ."'/>";
	        $possible_answer_string .= "<input type='hidden' id='question_type' name='question_type' value='" . $question_row['question_type'] . "'/>";
		$possible_answer_string .= "<input type='hidden' id='question_text' name='question_text' value ='" . $question_row['question_text'] . "'/>";	

		$possible_answer_string .= "</label>\n";
		  
	 }
 } elseif($question_row['question_type'] == 'textFR'){
	 
	 	$possible_answer_string .= "<form action = 'grading script for FRquestions here' method = 'get' name = 'answerBox'>";	
		
	 	$possible_answer_string .= "<label class= 'possibleAnswer'>\n";
		$possible_answer_string .= "<input type='text' name='answer' id='FROption' " . "'/>\n";
		#pass question information
		$possible_answer_string .= "<input type='hidden' id='question_id' name='question_id' value='" . $question_row['question_id'] ."'/>";
                $possible_answer_string .= "<input type='hidden' id='question_type' name='question_type' value='" . $question_row['question_type'] . "'/>";
		$possible_answer_string .= "<input type='hidden' id='question_text' name='question_text' value ='" . $question_row['question_text'] . "'/>";
		$possible_answer_string .= "</label>";

	 }
  
  

 $possible_answer_string .= "<input id='questionSubmit' class='button' type='submit' value='Submit'/>";
 $possible_answer_string .= "</form>";
 $possible_answer_string .= "</div>\n";

 #return resultant correct answer and answer options
 return $possible_answer_string;
}

?>

