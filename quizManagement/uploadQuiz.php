<!-- allows data transfer throygh session -->
<?php
# redirects users who are not logged in -->
include '../accessControl/loggedIn.php';
Allowed();

#includes the HTML code for the navigation bar
include "../homepage/navBar.php";
session_start();
?>


<link rel="stylesheet" type="text/css" href="/css/style.css">
<html>
  <head>
    <title>Upload Quiz | AFMS Online Onboarding Resource</title> 
  </head>

  <body>
    <!-- creates a container that will display the contents of the page -->
    <div class="container" id="uploadFileBox">
      <h1 id="quizInfoHeader">Upload a Quiz</h1>
      <!-- creates a form that will take in a file
           a submit button will call upon  a procedure to upload the file -->
      <form action="upload.php" method="POST" enctype="multipart/form-data">
	


	<p class='info'><strong>Quiz Name: </strong> <input type='text' name='quiz_name' id='quiz_name'>   </input>  </p>
	<p class='info'><strong>Description: </strong><br>
	<textarea name='quiz_description' id='quiz_description' rows="10" cols="50" class = 'descriptionTextBox'></textarea></p>
	<p class='info'><strong>Time limit: </strong> <input type='text' name='quiz_time_limit' id='quiz_time_limit'>  </input>  </p>



	<h3 style="text-align:center;">After uploading a .CSV file,<br>Click the Submit Button<br></h1>
	<div class="inputContainer">
	 <input type="file" name="fileToUpload" id="submitFile" accept=".csv"><br>        
	 <input class ='button' type="submit" value="Submit" id="submitButton" style="width:95%;margin-right:9px;">
	</div>
      </form>
     </div>
   </body>
  </div>
</html>
