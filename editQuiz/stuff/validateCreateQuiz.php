<?php
 session_start();
?>


<?php
        //include the function create in connectUser.php
        include '../connections/connectEmployee.php';

        #retrieve user's id
	#$user_id = $_SESSION['user_id'];	#uncomment when this page is tied to the website
	#create database handler with employee level privilege
	$dbh = ConnectEmployee();

	#set procedure paramaters
	#$author_id = $user_id;   #uncomment when this page is tied to the website
	$time_limit = 0;
	$quiz_name = 0;
	$quiz_description = "";

	###############
	#TEST
	#############
	$author_id = 54;
	$time_limit = 100;
	$quiz_name = 'debugging3';
	$quiz_description = "this is a test of the add quiz procedure from addQuiz.php";


	#construct call to Asrcoo.add_quiz procedure
        $query_string = " call Asrcoo.add_quiz(:aid,:tim,:nam,:des);";
	$stmt = $dbh->prepare($query_string);
	#bind procedure paramaters
	$stmt->bindParam(':aid', $author_id, PDO::PARAM_INT);
	$stmt->bindParam(':tim', $time_limit, PDO::PARAM_INT);
	$stmt->bindParam(':nam', $quiz_name, PDO::PARAM_STR);
	$stmt->bindParam(':des', $quiz_description, PDO::PARAM_STR);
        $stmt->execute();
	$result = $stmt->fetchAll();
	$result = $result[0];
	$quiz_id = $result['quiz_id'];

	echo "<div> A quiz was generated with quiz id:  " . $quiz_id . "</div>";


?>
