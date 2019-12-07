<?php

//Author: Frank

	#redirect users who are not logged In
	include '../accessControl/loggedIn.php';
	Allowed();
	include '../accessControl/adminLoggedIn.php';
	Admin();

	include '../homepage/navBar.php';

	
	$inspected_user_id = $_GET['inspected_user_id'];

?>
<html>
 <head> <title> Change Password </title> </head>
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <div id="createUserBox" class="container">
    <h1 id="tableHeading"> Change Password </h1>


 <form action='../userManagement/validateChangePassword.php' method="get" name="change_user_password">
    
    <div>
    <input id="changePassword" class="createUserForm" type="password" name="password"
    placeholder="Type new password">
    </div>

    <div>
    <input id="createUser" class="createUserForm" type="password" name="re_password"
    placeholder="Re-type new password">
    </div>    
    
    <input type='hidden' name='inspected_user_id' value='<?php echo $inspected_user_id?>'/>
    <input id="submitButton" class='button' style="width:150px" type="submit" value="Change Password"/>
    </form>

    <form action='../userManagement/manageUser.php'>
    <input id="cancelButton" class='button' type="submit" value="Cancel"/>
    </form>
 </div>

<script>

var err_msg='<?php
//unpack error msg if any
$error = $_SESSION['change_password_error_msg'];
//clear error msg to not be bombarded with unnecessary messages
 unset($_SESSION['change_password_error_msg']);
echo $error;
?>'

if (err_msg!==""){
        alert(' '.concat(err_msg));
}

var change_password_success_msg='<?php
//Unpack success message
$changed = $_SESSION['change_password_success_msg'];
//clear success message
unset($_SESSION['change_password_success_msg']);
echo $changed;
?>'
if(change_password_success_msg!==""){
        alert(' '.concat(change_password_success_msg));
}
</script>


</html>

