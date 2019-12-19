<?php
session_start();

include '../../connections/connectAdmin.php';

$subject = $_GET["subject_name"];

//get mysql pdo
$dbh = ConnectAdmin();
//construct query to create subject
$query_string = " call Asrcoo.add_subject(:sname); ";
//bind parameters to query
$stmt = $dbh->prepare($query_string);
$stmt->bindParam(':sname',$subject, PDO::PARAM_STR);

$stmt->execute();
header("Location: /quizManagement/subjects/managesubjects.php");

?>
