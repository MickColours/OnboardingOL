<?php
//Author: Matt
//The following code verifys valid user data for account creation
//Adds user information to the Asrcoo.user table if valid
//And sets an error message to the SESSION['add_user_error'] field if invalid
//after execution of these tasks it redirects the user to the account creation page.
session_start();

//if we wanted for ease of use to send what the error was, verifyCredentials code be chagned to return
//4 values 1-valid 2-email's wrong 3-pass's wrong 4-both wrong
//these error codes could be passed through the session variable
//and interpreted by php embedded on the src page (createUser.php)
function verifyCredentials($email1,$email2,$password1,$password2) {
	
	if ($email1==$email2 AND $password1==$password2 AND $email1!="" AND $password1!="") {
		return 1;
	}else {
		return 0;
	}
}

include '../connections/connectAdmin.php';


$email1 = $_GET["user_name"];
$email2 = $_GET["re_user_name"];
$pass1  = $_GET["password"];
$pass2  = $_GET["re_password"];
$priv = 1; //in the future we can pass this through from a select that allows admin creation
 
$valid = verifyCredentials($email1,$email2,$pass1,$pass2);

//credentials match
//create user in db
if ($valid==1){

	//explode: takes a string an splits it into an array with strings values
	//that are separeted by a delimeter i.e. "@"
	//below I break email1 into an array of 2 values
	//assign it to itself then assign itself to its first half (before the @)
	$email1 = explode("@",$email1);
	$email1=$email1[0];


	//get mysql pdo
	$dbh = ConnectAdmin();
	//construct query to call add_user procedure
	$query_string = " call Asrcoo.add_user(:usn,:uas,:upr); ";
	//bind parameters to qeury
	$stmt = $dbh->prepare($query_string);
	$stmt->bindParam(':usn',$email1, PDO::PARAM_STR);
	$stmt->bindParam(':uas',$pass1, PDO::PARAM_STR);
	$stmt->bindParam(':upr',$priv, PDO::PARAM_STR);

	$stmt->execute();
	$_SESSION['create_user_success_msg']='Created user successfully.';
	header("Location: /userManagement/createUser.php");

//credentials do not match
}else{
	$_SESSION['add_user_error_msg']='Invalid Credentials';
	header("Location: /userManagement/createUser.php");
}



?>
