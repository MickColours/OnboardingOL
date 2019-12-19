<?php
include '../../connections/connectAdmin.php';

$subject_id = $_GET["inspected_subject_id"];
$subject_name= $_GET["inspected_subject_name"];

$dbh = ConnectAdmin();

$query_string = " call Asrcoo.delete_subject(:sid); ";
$stmt = $dbh->prepare($query_string);
$stmt->bindParam(':sid',$subject_id, PDO::PARAM_STR);
$stmt->execute();

//store success message in session variable
//$_SESSION['deletion_success_message']= $subject_name . " was successfully deleted";
//redirect user to the manageUser.php page
header("Location: /quizManagement/subjects/managesubjects.php");

?>

