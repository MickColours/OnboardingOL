<?php
 session_start();
?>


<?php
        //include the function create in connectUser.php
        include '../connections/connectEmployee.php';

        #create database handler with employee level privilege
        $dbh = ConnectEmployee();

	#set procedure paramaters
	$quiz_id = $_GET['inspected_quiz_id'];
	#construct call to Asrcoo.toggle_quiz_visibility procedure
	
        $query_string = " call Asrcoo.toggle_quiz_visibility(:qid);";
        $stmt = $dbh->prepare($query_string);
        #bind procedure paramaters
        $stmt->bindParam(':qid', $quiz_id, PDO::PARAM_INT);
        $stmt->execute();

        //go to edit quiz overview
        header("Location: http://54.198.147.202/quizManagement/manageQuiz.php");

?>
