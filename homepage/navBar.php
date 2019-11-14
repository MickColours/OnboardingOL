<!DOCTYPE html>
<?php
  session_start();
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>AFMS Onboarding Online Resource</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <header>
    <div class="navBar">
      <a href="/homepage/homepage.php">
        <img src="/src/asrc_logo.jpg" alt="ASRC logo"
	style="width:140px; height:80px;display:inline;padding-right:20px;padding-top:8px;padding-left:10px;" align="left"/>
      </a>
      <br>
      <h1 style="display:inline;">AFMS Onboarding Online Learning Resource</h1>
      <br>
    <a href="/takeQuiz/takeQuiz.php">
      <button class="dropbtn">Take a Quiz</button>
    </a>
    <div class="dropdown">
      <button class="dropbtn">Create a Quiz</button>
      <div class="dropdown-content">
        <a href="/editQuiz/createQuizInfo.php">Create Quiz Manually</a>
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
        <a href="#">My quizzes</a>
      </div>
  </div>

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
	<!-- Testing to replace this with a form that triggers accessControl/logout.php
    <a href="/login.php">
      <button class="dropbtn">Logout</button>
    </a>
	-->

	<form style="display:inline;" action='http://54.198.147.202/accessControl/logout.php' method='get' name='logout'>
	<input id='submit' class='dropbtn' type='submit' value='Logout'/>
	</form>


      </div>
  </header>
</html> 





