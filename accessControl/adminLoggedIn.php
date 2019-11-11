<?php
//The purpose of this function is to 
//Check to make sure the user logged in
//is an admin so users without the correct
//priveleges cannot access admin pages

function Admin(){
	session_start();
	$user_privilege = $_SESSION['user_privilege'];

	if ($user_privilege == 2){
		//Do nothing
		//The user already
		//has the correct permissions
	}else{
		//user is sent back to the homepage 
		header("Location: http://54.198.147.202/homepage/homepage.php");
	}
  }
?>
