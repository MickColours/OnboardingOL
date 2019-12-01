<?php
 session_start();
?>


<?php
        //include the function create in connectUser.php
        include '../../connections/connectEmployee.php';

        #create database handler with employee level privilege
	$dbh = ConnectEmployee();

	$question_id = $_GET['question_id'];

	#construct call to remove the question from the quiz .
	#note the question is not deleted, intentionally!
	
        $query_string = " call Asrcoo.delete_textQuestion(:qid);";
        $stmt = $dbh->prepare($query_string);
        #bind procedure paramaters
	$stmt->bindParam(':qid', $question_id, PDO::PARAM_INT);
        $stmt->execute();

        //go to manage a quiz
        header("Location: http://54.198.147.202/quizManagement/edit/editQuizOverview.php");

?>
