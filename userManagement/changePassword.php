<?php

	#redirect users who are not logged In
	include '../accessControl/loggedIn.php';
	Allowed();
	include '../accessControl/adminLoggedIn.php';
	Admin();

	include '../homepage/navBar.php';
?>
<html>
 <head> <title> Change Password </title> </head>
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <div id="createUserBox" class="container">
    <h1 id="tableHeading"> Change Password </h1>


 <form action='../???' method="get" name="change_user_password">

    <input id="changePassword" class="input" type="password" name="password"
    placeholder="Type new password">

    <input id="createUser" class="input" type="password" name="re_password"
    placeholder="Re-type new password">

    <input id="submitButton" class='button' style="width:150px" type="submit" value="Change Password"/>
    </form>

     <form action='http://54.198.147.202/userManagement/manageUser.php'>
    <input id="cancelButton" class='button' type="submit" value="Cancel"/>
 </form>
 </div>

</html>

