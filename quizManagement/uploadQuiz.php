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
      <h1 class="h1"> Upload a Quiz </h1>
      <!-- creates a form that will take in a file
           a submit button will call upon  a procedure to upload the file -->
      <form>
        <h1 class="h1"><br>After uploading your csv file click Submit<br></h1>
	<div class="inputContainer">
	 <input type="file" name="name" single><br>        
	 <input class ='button' type="submit" value="Submit" id="submitButton" style="width:95%;margin-right:9px;">
	</div>
      </form>
   </body>
  </div>
</html>
