<!DOCTYPE html>
<!-- allow data transfer through session -->
<?php 
 session_start();
?>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ASRC Onboarding</title>
  <link rel="stylesheet" type="text/css" href="/css/style_login.css">
</head>
<body>

<!-- partial:index.partial.html -->
<html>
  <head>
    <title>
      AFMS Onboarding Online Learning Resource
    </title>
  </head>
  
  <body>
    <h1>
      AFMS Onboarding Online Learning Resource
    </h1>
   
 <form action='validate/validateLogin.php' method="get" name="login">
    <div id='login'>
      <p>Username</p>
      <input type="text" name="userid"/>
      <p>Password</p>
      <input type="password" name="pswrd"/>
    </div>
    
    <input id='submit' class='button' type="submit"  value="Login"/>
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
<!-- partial -->
  
</body>
</html>
