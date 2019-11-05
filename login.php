<!DOCTYPE html>
<!-- allow data transfer through session -->
<?php 
 session_start();
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <title>
      AFMS Onboarding Online Learning Resource
    </title>
  </head>
  
  <body>
  <div class="loginHeader">
    <h1>
      AFMS Onboarding Online Learning Resource
    </h1>
  </div>
  <form id="loginForm" action='validate/validateLogin.php' method="get" name="login">
    <div id='loginBox' class="container">
      <label for="name">Username</label>
      <input id="userNameInput" type="text" name="user_name"/>
      <label for="password">Password</label>
      <input id="passwordInput" type="password" name="user_password"/>
    <input id='submitButton' class='button' type="submit"  value="Login" style="float:none; width:100%;">
    </div>
  </form>

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
  </body>
</html>
