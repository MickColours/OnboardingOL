<?php
# redirects users who are not logged in -->
include '../accessControl/loggedIn.php';
Allowed();

# #includes the HTML code for the navigation bar
include "../homepage/navBar.php";
session_start();

$uploaddir = '/var/www/html/quizManagement/uploads/';
$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);
$upload_success = 0;	
if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) {
	$upload_success = 1;
	echo "File is valid, and was successfully uploaded.\n";
} else {
	echo "Upload failed";
}
$csv = array_map('str_getcsv', file($uploadfile));
$answers_array = [];
$correct_answers_array = [];
$quiz_name = $_POST['quiz_name'];
$quiz_description = $_POST['quiz_description'];

foreach ($csv as $line) {
	$answers_array = explode(";", $line[3]);
	$correct_answers_array = explode(";", $line[4]);
}

# Call Database Procedures
if ($upload_success == 1) {
	#include the function create in connectUser.php
	include '../connections/connectEmployee.php';
	#create database handler with employee level privilege
	$dbh = ConnectEmployee();
	$author_id = $_SESSION['user_id'];
	$time_limit = $_POST['quiz_time_limit'];
	
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
	#loop through CSV file to enter the information
	#into the database
	$question = "";
	$points = 0;
	foreach($csv as $line) {
		$answers_array = explode(";", $line[3]);
		$correct_answers_array = explode(";", $line[4]);
		$question = $line[2];
		$points = $line[1];
		switch ($line[0]) {
			case "MC":
				$query_string = " call Asrcoo.add_quizQuestion(:qid,:qtxt,:pts,'textMC');";
				break;
			case "SATA":
				$query_string = " call Asrcoo.add_quizQuestion(:qid,:qtxt,:pts,'textSATA');";
				break;
			case "FR":
				$query_string = " call Asrcoo.add_quizQuestion(:qid,:qtxt,:pts,'textFR');";
				break;
		}
		#create quiz question in database
		$stmt = $dbh->prepare($query_string);
		#bind procedure paramaters
		$stmt->bindParam(':qid', $quiz_id, PDO::PARAM_INT);
		$stmt->bindParam(':qtxt', $question, PDO::PARAM_STR);
		$stmt->bindParam(':pts', $points, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetchAll();
		$result = $result[0];
		$validity = 0;
		#store the resultant question id
		$question_id = $result['thisQuestion_id'];
		
		#add answers to each question in database
		foreach ($answers_array as $key=>$answer) {
			#echo "Key: " . $key . " Answer: " . $answer;
			if (in_array(($key + 1), $correct_answers_array) == 1) {
				#add question to database with correct validity
				$validity = 1;
				$query_string = " call Asrcoo.add_textAnswer(:qid,:ans,:val);";
				$stmt = $dbh->prepare($query_string);
				#bind procedure paramaters
				$stmt->bindParam(':qid', $question_id, PDO::PARAM_INT);
				$stmt->bindParam(':ans', $answer, PDO::PARAM_STR);
				$stmt->bindParam(':val', $validity, PDO::PARAM_INT);
				$stmt->execute();			                                                            
			} else {
				#add question to database with incorrect validity
			  	$validity = 0;
				$query_string = " call Asrcoo.add_textAnswer(:qid,:ans,:val);";
				$stmt = $dbh->prepare($query_string);
				#bind procedure paramaters
				$stmt->bindParam(':qid', $question_id, PDO::PARAM_INT);
				$stmt->bindParam(':ans', $answer, PDO::PARAM_STR);
				$stmt->bindParam(':val', $validity, PDO::PARAM_INT);
				$stmt->execute();
				}
			}
		}	
	}	
	#store newly created quiz id in the session
	$_SESSION['edit_quiz_id'] = $quiz_id;
	$_SESSION['edit_quiz_name'] = $quiz_name;
	#go to edit quiz overview
	header("Location: http://54.198.147.202/quizManagement/edit/editQuizOverview.php");
?>

<link rel="stylesheet" type="text/css" href="/css/style.css">
<html>
  <head>
    <title>Upload Quiz | AFMS Online Onboarding Resource</title>
  </head>
  <body>
    <div class="container">
      <h1>Upload a Quiz</h1>
<?php
	if ($upload_success == 1) {
		echo "The quiz has been successfully created.";
	} else {
		echo "An error has occurred. The quiz has not been created";
	}

?>
    </div>
  </body>
</html>
