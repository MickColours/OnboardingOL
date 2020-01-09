<?php

/*	Author : Matthew Keville
 *	
 *	This file loads variables into the session
 *	for quiz editing
 *	
 */
session_start();
$_SESSION['edit_quiz_id'] =$_GET['inspected_quiz_id'];
$_SESSION['edit_quiz_name']= $_GET['inspected_quiz_name'];
header("Location: /quizManagement/edit/editQuizOverview.php");
?>
