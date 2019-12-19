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
        <a href="/quizManagement/create/createQuizInfo.php">Create Quiz Manually</a>
        <a href="/quizManagement/uploadQuiz.php">Upload Quiz</a>
      </div>
    </div>
    <a href="/quizManagement/manageQuiz.php">
	<button class="dropbtn">Manage a Quiz</button>
    </a>

<?php
 $div_string = " <div class='dropdown'>";
 $div_string .= " <button class='dropbtn'>Mentor</button> ";
 $div_string .= "<div class='dropdown-content'>";
 $div_string .= "<a href='/userManagement/viewUser.php'>Manage User</a>";
 $div_string .= "<a href='/quizManagement/subjects/managesubjects.php'>Manage Subjects</a>";
 $div_string .= " </div>";
 $div_string .= " </div>";
 $div_string .= " <div class='dropdown'>";
 $div_string .= " <button class='dropbtn'>Metrics</button> ";
 $div_string .= "<div class='dropdown-content'>";
 $div_string .= "<a href='/metrics/metricsByUser.php'>By User</a>";
 $div_string .= "<a href='/metrics/metricsByQuiz.php'>By Quiz</a>";
 $div_string .= "<a href='/metrics/metricsBySubject.php'>By Subject</a>";
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

<?php
 $user_name=$_SESSION['user_name'];
 $name_string .= "";
 $name_string .= "<div class='dropdown' style='float:right; margin: -3px -3px 0px -50px;'>\n";
 $name_string .= "<button class='dropbtn'>" . $user_name ."<img src='/src/default-avatar.png' alt='User' style='width:30px; margin:-4px 0px -8px 20px;'/></button>\n";
 $name_string .= "<div class='dropdown-content' id='options'>\n";
 $name_string .= "<a href='/userInfo/myGrades.php'>My Grades</a>\n";
 $name_string .= "<a href='/metrics/myQuizMetrics.php'>My Quiz Metrics</a>\n";
 $name_string .= "<form action='http://54.198.147.202/accessControl/logout.php' method='get' name='logout'>\n";
 $name_string .= "<input id='submit' class='dropdown-content' type='submit' value='Logout'/>\n";
 $name_string .= "</form>";
 $name_string .= "</div>\n";
 $name_string .= "</div>\n";

 echo $name_string;
?>

      </div>
  </header>
</html> 





