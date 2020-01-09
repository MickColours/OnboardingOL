<?php
//The purpose of this function is to 
//Check to make sure if the user who logged in
//is an mentor so users without the correct
//priveleges cannot access mentor pages

function Admin(){
	session_start();
	$user_privilege = $_SESSION['user_privilege'];

	if ($user_privilege == 2){
		//Do nothing
		//The user already has the correct permissions
	}else{
		//user is sent back to the homepage 
		header("Location: ../homepage/homepage.php");
	}
  }
?>
