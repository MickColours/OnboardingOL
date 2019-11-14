<?php
 session_start();
?>


<?php
        //include the function create in connectUser.php
        include '../connections/connectEmployee.php';


	#retrieve make_quiz_id
	#$quiz_id = $_SESSION['make_quiz_id'];
	#retrieve question type
	#$question_type = $_GET['question_type'];
	
	#create database handler with employee level privilege
	$dbh = ConnectEmployee();

	#add the question to the database
	#question_text , question_type, point value
	

	#loop through each potential answer and 
	#add the answer, add it to the textAnswer table
	#and tie the textAnswer to the provided question id


	#suppose the question is 
	# If jim has 5 apples, does jim have 5 apples?

	$answer1 = array( "answer_text" => "no way",
		"validity" => 0);
	$answer2 = array( "answer_text" => "yes way",
		"validity" => 1);
	$answer3 = array( "answer_text" => "insufficient information",
		"validity" => 0);

	$answer_array=array();
	$answer_array[0]=$answer1;
	$answer_array[1]=$answer2;
	$answer_array[2]=$answer3;


	foreach ($answer_array as $row){
		$thisAnswer = $row['answer_text'];
		$thisValidity = $row['validity'];
		echo $thisAnswer . " : " . $thisValidity;	
	}

	#set procedure paramaters

	/*

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

	*/



?>
