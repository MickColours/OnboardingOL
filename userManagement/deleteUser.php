<?php session_start();

include '../connections/connectAdmin.php';

$user_id = $_GET["inspected_user_id"];
$user_name= $_GET["inspected_user_name"];

$dbh = ConnectAdmin();

$query_string = " call Asrcoo.delete_user(:uid); ";
$stmt = $dbh->prepare($query_string);
$stmt->bindParam(':uid',$user_id, PDO::PARAM_STR);
$stmt->execute();

//store success message in session variable
$_SESSION['deletion_success_message']= $user_name . " was successfully deleted";
//redirect user to the manageUser.php page
header("Location: /userManagement/viewUser.php");



?>

