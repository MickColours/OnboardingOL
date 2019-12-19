<!DOCTYPE html>
<!-- The login page will take user crendentials and pass these values to another -->
<!-- php file that will then match them to the database. If there is a match, then -->
<!-- it will redirect the user to the homepage. Otherwise, it will display an error -->
<!-- message and redirect back to the login page. -->

<!-- allow data transfer through session -->
<?php 
 session_start();
?>

<html class="loginPage">
  <head>
    <!-- References the CSS file -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <title>Login | AFMS Onboarding Online Learning Resource</title>
  </head>
  
  <body class="loginPage">
    <!-- Introduces the header/banner for the login -->
    <div class="loginHeader">
      <h1><br>AFMS Onboarding Online Learning Resource</h1>
      <br>
    <form id="loginForm" action='validate/validateLogin.php' method="get" name="login">
      <!-- Creates a container to display the form and submit button -->
      <div id='loginBox' class="container">
        <label for="name">Username</label>
        <input id="userNameInput" type="text" name="user_name"/><br>
        <label for="password">Password</label>
        <input id="passwordInput" type="password" name="user_password"/>
        <input id='submitButton' class='button' type="submit"  value="Login" style="float:none; width:100%;">
      </div>
    </form>


    </div>

    <!-- Creates a form for the user to enter their username and password. 
	 Once the button is pressed, it will redirect to validateLogin.php 
	 validateLogin.php matches the information from the form to the database -->
    <!-- the below script allows the form action to be triggered by pressing enter -->
    <script language="javascript">
      var input = document.getElementById("login");
      input.addEventListener("keyup", function(event) { 
	//number 13 is enter
	if (event.keyCode === 13) {
		// cancel the default action, if needed
		event.preventDefault();
		// Trigger the button element with a click
		document.getElementById("submit").click();
		}
	});
    </script>

<!-- Display a login error message 
	#author : Matt date :11/9/19-->
<script language="javascript">
 var error_message='<?php
   $error_message = $_SESSION['login_error_msg'];
   unset($_SESSION['login_error_msg']);
   echo $error_message;
   ?>'
  if (error_message!==""){
	alert(' '.concat(error_message)); }
</script>



  </body>
</html>
