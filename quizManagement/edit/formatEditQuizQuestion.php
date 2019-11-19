<?php
session_start();
?>

<html>
<?php
function formatEditQuizQuestion($question_type) {
  $format_string = "";  

  //if($question_type == 'textMC' || 'textSATA') {
    
  //}
  //else if($question_type == 'textFR') {
	  $format_string .= "<p class='answer'><strong>Answer: </strong> ";
	  $format_string .= "<input type='text' name='answer' id='editAnswerText'></input> </p>";
  //}
  
  return $format_string;
}
?>

</html>
