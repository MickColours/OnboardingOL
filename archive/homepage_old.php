<!DOCTYPE html>

<?php
session_start();
//include '../accessControl/allowedUser.php';
//$res = Allowed();
?>

<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>ASRC Onboarding</title>
    <link rel="stylesheet" type="text/css" href="/css/style_home.css">
  </head>
<!DOCTYPE html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <header>
    <div class="header">
      <a href="/homepage/homepage.php">
        <img src="/src/asrc_logo.jpg" alt="ASRC logo"
	style="width:140px; height:80px;display:inline;padding-right:20px;padding-top:8px;padding-left:10px;" align="left"/>
      </a>
      <br>
      <h1 style="display:inline;">AFMS Onboarding Online Learning Resource</h1>
      <br>
    <!--Note: I will leave most of these as dropdown menus temporarily, 
              until we can utilize the database to pull up quizzes to display. 
              We may need to change it from a dropdown if necessary. -->
    <a href="/takeQuiz/takeQuiz.php">
      <button class="dropbtn">Take a Quiz</button>
    </a>
    <!-- This menu can be used as a dropdown, as it probably is best for it -->
    <div class="dropdown">
      <button class="dropbtn">Create a Quiz</button>
      <div class="dropdown-content">
        <a href="/quizManagement/createQuiz.php">Create Quiz Manually</a>
        <!-- We need to decide whether this will be a file upload or a link to a file upload window/page -->
        <a href="/quizManagement/uploadQuiz.php">Upload Quiz</a>
      </div>
    </div>
    <a href="/quizManagement/editQuiz.php">
	<button class="dropbtn">Edit a Quiz</button>
    </a>
  <div class="dropdown">
      <button class="dropbtn">Grades</button>
      <div class="dropdown-content">
        <a href="/userInfo/myGrades.php">My Grades</a>
        <a href="#">My Tests</a>
      </div>
  </div>

<!-- Old way of getting these links since users should only see this content if they are admins we will generate the html
through a php script that checks the current users's privilege. If they are admins this is echoed out -->
<!--
<div class="dropdown">
      <button class="dropbtn">Admin</button>
      <div class="dropdown-content"> 
        <a href="/userManagement/manageUser.php">Manage User</a>
        <a href="#">Metrics</a>
      </div>
  </div>
-->



<?php
 
 $div_string = " <div class='dropdown'>";
 $div_string .= " <button class='dropbtn'>Admin</button> ";
 $div_string .= "<div class='dropdown-content'>";
 $div_string .= "<a href='/userManagement/viewUser.php'>View User</a>";
 $div_string .= "<a href='/userManagement/metrics.php'>Metrics</a>";
 $div_string .= " </div>";
 $div_string .= " </div>";

 $current_privilege = $_SESSION['user_privilege'];
 if ($current_privilege==2){
	 echo $div_string;
 } 
?>


  <!-- Redirects to login page -->
    <!-- We will need to ensure the user cannot log back in if they go to previous page -->
    <a href="/login.php">
      <button class="dropbtn">Logout</button>
    </a>
      </div>
  </header>
  <body>
	<!-- Gather the welcome message from validate.php and display if it is non-empty 
		clear the message once it is gathered to avoid displaying it every time the user
		returns to the homepage 
	-->
	<script>
	var welcome_message='<?php 
 	$welcome_message = $_SESSION['welcome_msg'];
   	unset($_SESSION['welcome_msg']);
 	echo $welcome_message;
	?>'
	
	if (welcome_message!==""){
	alert(' '.concat(welcome_message));
	}
	</script>


  </body>
</html>
