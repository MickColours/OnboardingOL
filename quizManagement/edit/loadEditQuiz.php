<?php

/*	Author : Matthew Keville
 *	
 *	This file loads variables into the session
 *	for quiz editing
 *	
 */

$_SESSION['edit_quiz_id'] = $_GET['inspected_quiz_id'];
$_SESSION['edit_quiz_name']= $_GET['inspected_quiz_name'];
header("Location: http://54.198.147.202/quizManagement/edit/editQuizOverview.php");
?>
