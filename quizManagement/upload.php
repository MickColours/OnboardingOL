<?php
# redirects users who are not logged in -->
include '../accessControl/loggedIn.php';
Allowed();

# #includes the HTML code for the navigation bar
include "../homepage/navBar.php";
session_start();

$uploaddir = '/var/www/html/quizManagement/uploads/';
	$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);
	
	if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) {
	    echo "File is valid, and was successfully uploaded.\n";
	} else {
	    echo "Upload failed";
	}

?>


<link rel="stylesheet" type="text/css" href="/css/style.css">
<html>
  <head>
    <title>Upload Quiz | AFMS Online Onboarding Resource</title>
  </head>

  <body>
    <div class="container">
      <h1>Upload a Quiz</h1>
    </div>


  </body>
</html>
