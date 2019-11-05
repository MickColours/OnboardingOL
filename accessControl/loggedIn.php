<?php
//this function checks the session logged_in field
//to see if it is not set to 1
//if it is not the user is not logged in and we redirect them to the login page.
function Allowed(){
session_start();
$logged_in = $_SESSION['logged_in'];

if ($logged_in == 1){
	//do nothing
}else{ //go back to login page
	#observe the user of the public file path
	#This clears up the problem of relativity
	header("Location: http://54.198.147.202/login.php");
}
}

?>
