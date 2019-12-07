<?php
//Author: Frank

include '../connections/connectEmployee.php';
session_start();

//Want to verify the password to make sure
//That it isn't empty and that the initial
//password and the retyped password match
function verifyMatch($pass1,$pass2){

	if($pass1 == $pass2 AND $pass1 != ""){
		return true;
	} else{
		return false;
	}
}

//Gather necessary information in
//variables to change the user's password
$userID = $_GET["inspected_user_id"];
$pass1 = $_GET["password"];
$pass2 = $_GET["re_password"];

//store the result of verifyMatch in 
//a variable
$valid = verifyMatch($pass1,$pass2);

if($valid){
	
	//passwords are hashed so we call the password hash function
	$hash = password_hash($pass2, PASSWORD_BCRYPT);

	$dbh = ConnectEmployee();

	$query_string = " call Asrcoo.edit_authentication_string(:uid,:uas); ";
	
	//binding params to query
	$stmt = $dbh->prepare($query_string);
	$stmt->bindParam(':uid',$userID, PDO::PARAM_INT);
	$stmt->bindParam(':uas',$hash, PDO::PARAM_STR);

	$stmt->execute();

	//upon success a message will be displayed that the 
	//password change was a success
	$_SESSION['change_password_success_msg']='Changed password successfully.';
	header("Location: /userManagement/changePassword.php");

} else{
	//upon failure the user will be notified that
	//the password change did not occur and notfiy
	//them the entered password was invalid
	$_SESSION['change_password_error_msg']='Password not changed, Invalid password';
	header("Location: /userManagement/changePassword.php");
}

?>






