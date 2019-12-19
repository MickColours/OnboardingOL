<!DOCTYPE html>
<!-- The homepage includes the navigation bar so users can travel through
     different pages. It displays the contents of what the user should
     see once they log in -->

<!-- allows data transfer through session -->
<?php
session_start();

#redirect users who are not logged In
include '../accessControl/loggedIn.php';
Allowed();

#includes the HTML code for the navigation bar
include '../homepage/navBar.php';
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage | AFMS Onboarding Online Learning Resource</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
	<!-- Gather the welcome message from validate.php and display if it is non-empty 
		clear the message once it is gathered to avoid displaying it every time the user
		returns to the homepage -->
  <script>
    var welcome_message='<?php 
    $welcome_message = $_SESSION['welcome_msg'];
    unset($_SESSION['welcome_msg']);
    echo $welcome_message;
    ?>'
    if (welcome_message!==""){
	    alert(' '.concat(welcome_message));	}
    </script>
  <body>

    <div id="generalInfoSection">
      <p id="generalInfo"><strong>
	The Onboarding Online Learning Resource is a quiz system designed to train employees and to help them gain knowledge needed to accomplish tasks at AFMS.
      </strong></p>
      <img src="/src/group_meeting_image.jpg" alt="group meeting"  id="generalInfoImage"/>
    </div>
    
    <div id="iconSection">
      <div class="iconContainer">
        <a href="/takeQuiz/takeQuiz.php">
          <img src="/src/take_quiz_icon.png" style="width:153px; height:166px;"/>
        </a>
        <h2>Take Quizzes</h2>
        <p>Test your knowledge with quizzes created by mentors and employees</p>
      </div>
      <div class="iconContainer">
        <a href="/quizManagement/manageQuiz.php">
          <img src="/src/create_quiz_icon.png" style="width:153px; height:166px;"/>
        </a>
        <h2>Manage Quizzes</h2>
        <p>Create and edit your own quizzes for the use of you and your peers</p>
      </div>
      <div class="iconContainer">
        <a href="/userManagement/metrics.php">
          <img src="/src/manage_user_icon.png" style="width:153px; height:166px;"/>
        </a>
        <h2>Mentors</h2>
        <p>Mentors can view metrics of employees, manage subjects, and manage all quizzes, as well as make their own</p>
      </div>
    </div>
    
    <div id="tableSideSection">
      <p id="tableSideText">Check out the most popular quizzes right now!</p><br><br><br><br><br><br>
      <p id="tableSideText">Also, check out some of these interesting facts!</p>
    </div>
    <div class="metricsSection" id="topQuizSection">
      <table class="topQuizzes" id="label">
        <tr>
          <th class="topQuizData">Most Popular Quizzes</th>
        </tr>
      </table>
      <table class="topQuizzes">
	<tr>
	  <th class="topQuizData">Quiz Name</th>
	  <th class="topQuizData"># of Attempts</th>
	</tr>
<?php
    include '../connections/connectEmployee.php';
    session_start();

    $dbh = connectEmployee();
    $query_string = "call Asrcoo.get_top_quizzes(10);";
    $sth = $dbh->prepare($query_string);
    $sth->execute();

    $table_string = "";
    foreach($sth->fetchAll() as $row){
	    $table_string .= "<tr class='metricsRow'>\n";
	    $table_string .= "<td>" . $row['name'] . "</td>\n";
	    $table_string .= "<td>" . $row['attempts'] . "</td>\n";
	    $table_string .= "</tr>\n";
    }
    echo $table_string;
?>

      </table>
      <br><br>
      <table class="topQuizzes" id="label">
        <tr>
          <th class="topQuizData">Total Time Spent Taking Quizzes In Minutes</th>
        </tr>
      </table>
      <table class="topQuizzes">
<?php
    $dbh1 = connectEmployee();
    $query_string1 = "call Asrcoo.get_total_time_spent();";
    $sth1 = $dbh1->prepare($query_string1);
    $sth1->execute();

    $table_string = "";
    foreach($sth1->fetchAll() as $row){
	    $table_string .= "<tr class='metricsRow'>\n";
	    $table_string .= "<td>" . $row['time'] . " minutes</td>\n";
	    $table_string .= "</tr>\n";
    }
    echo $table_string;
?>
      </table>
      <br><br>

      <table class="topQuizzes" id="label">
        <tr>
          <th class="topQuizData">Total Quiz Attempts</th>
        </tr>
      </table>
      <table class="topQuizzes">
<?php
    $dbh = connectEmployee();
    $query_string = "call Asrcoo.get_total_attempts();";
    $sth = $dbh->prepare($query_string);
    $sth->execute();

    $table_string = "";
    foreach($sth->fetchAll() as $row){
	    $table_string .= "<tr class='metricsRow'>\n";
	    $table_string .= "<td>" . $row['attempts'] . "</td>\n";
	    $table_string .= "</tr>\n";
    }
    echo $table_string;
?>
      </table>
      <br><br>

      <table class="topQuizzes" id="label">
        <tr>
          <th class="topQuizData">Top 3 Subjects</th>
        </tr>
      </table>
      <table class="topQuizzes">
	<tr>
	  <th class="topQuizData">Subject Name</th>
	  <th class="topQuizData"># of Attempts</th>
	</tr>
<?php
    $dbh = connectEmployee();
    $query_string = "call Asrcoo.get_top_subjects(3);";
    $sth = $dbh->prepare($query_string);
    $sth->execute();

    $table_string = "";
    foreach($sth->fetchAll() as $row){
	    $table_string .= "<tr class='metricsRow'>\n";
	    $table_string .= "<td>" . $row['name'] . "</td>\n";
	    $table_string .= "<td>" . $row['total_attempts'] . "</td>\n";
	    $table_string .= "</tr>\n";
    }
    echo $table_string;
?>
      </table>
    </div>
   
    <div id="inspirationalBackground">
      <div id="transparentBlueAndText">
        <p id="quoteText">"If you can't explain it simply, you don't understand it well enough"<br>-Albert Einstein</p>
      </div>
    </div>

<?php
    include '../homepage/footer.php';
?>
  </body>
</html>
