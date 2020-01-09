<?php
 session_start();
?>


<?php
        //include the function create in connectUser.php
        include '../connections/connectEmployee.php';

        #create database handler with employee level privilege
        $dbh = ConnectEmployee();

	$quiz_id = $_GET['inspected_quiz_id'];

        #construct call to Asrcoo.add_quiz procedure
        $query_string = " call Asrcoo.delete_quiz(:qid);";
        $stmt = $dbh->prepare($query_string);
        #bind procedure paramaters
        $stmt->bindParam(':qid', $quiz_id, PDO::PARAM_INT);
        $stmt->execute();

        //go to manage a quiz
        header("Location: /quizManagement/manageQuiz.php");

?>
