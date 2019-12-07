<?php
//Author:Frank

session_start();

include '../connections/connectAdmin.php';

//Set variables for user we 
//are trying to change privilege for
$user_id = $_GET["inspected_user_id"];
$user_name = $_GET["inspected_user_name"];

//Connect to the database as an admin since
//this the query only has Admin privileges
$dbh = ConnectAdmin();

//get our query string prepared and executed
$query_string = " call Asrcoo.toggle_user_privilege(:uid); ";
$stmt = $dbh->prepare($query_string);
$stmt->bindParam(':uid',$user_id, PDO::PARAM_INT);
$stmt->execute();

//display success message
$message = $user_name . " was successfully made into a mentor";
echo "<script type='text/javascript'>alert('$message');</script>";
//redirect user to the manageUser.php page
header("Location: /userManagement/viewUser.php");

?>
