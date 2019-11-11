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
  <body>
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
  </body>
</html>
