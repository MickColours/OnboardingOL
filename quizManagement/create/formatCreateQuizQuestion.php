<?php
session_start();

//Author : Matt :Date :11/16

//format a new free response question
function formatNewTextFRAnswer() {
  $format_string = "";
  $format_string .= "<p class='answer'><strong>Answer: </strong> ";
  $format_string .= "<input type='text' name='answer' id='editAnswerText'></input> </p>";
  
  return $format_string;
}









?>

