<!DOCTYPE html>
<?php

#redirect users who are not logged In
include '../accessControl/loggedIn.php';
Allowed();
include '../accessControl/adminLoggedIn.php';
Admin();

include '../homepage/navBar.php';
?>
<html>
<!--Author: Frank , Matt 
The below code takes the form data to the file addUser.php 
This php script will check to see if the fields below are in agreement
And not null. If so the Asrcoo.add_user procedure is executed with admin
privilege. If the data was not valid an error message is set and opened upon redirection 
to this page as mentioned below.
-->




  <head> <title> Create a User </title> </head>
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <div id="createUserBox" class="container">
    <h1 id="quizInfoHeader"> Create a New User </h1><br>
 <form action='validateCreateUser.php' method="get" name="add_user_request">

    <input id="createUser" class="createUserForm" type="text" name="user_name"
    placeholder="Enter employee's email">
    
    <input id="createUser" class="createUserForm" type="text" name="re_user_name"
    placeholder="Re-enter employee's email">
    
    <input id="createUser" class="createUserForm" type="password" name="password"
    placeholder="Type desired password">
    
    <input id="createUser" class="createUserForm" type="password" name="re_password"
    placeholder="Re-type desired password">

    <br><input type="checkbox" class="createUserCheckbox" id="createUserCheckbox" name="mentorCheckbox" value="true">Mentor</input></br>

    <input id="submitButton" class='button' type="submit" value="Create User"/>
    </form>

     <form action='http://54.198.147.202/homepage/homepage.php'> 
    <input id="cancelButton" class='button' type="submit" value="Cancel"/>
     </form>
 </div>



<script>
/*
Display error message from addUser.php if any
Below I'm utilizing message passing through the session variable belonging to
php. The php file addUser.php sets a Session field called 'add_user_error'
When this page is serviced, the below script executes a php subscript that 
prints out the value of the add_user_error in the session variable, clears that field,then passes
it javascript to check if it is not null.
If so an alert tells the user of there error
*/

var err_msg='<?php
session_start();
//unpack error msg if any
$error = $_SESSION['add_user_error_msg'];
//clear error msg to not be bombarded with unnecessary messages
 unset($_SESSION['add_user_error_msg']);
echo $error;
?>'

if (err_msg!==""){
	alert(' '.concat(err_msg));
}

var create_success_msg='<?php
//Unpack success message
$created = $_SESSION['create_user_success_msg'];
//clear success message
unset($_SESSION['create_user_success_msg']);
echo $created;
?>'
if(create_success_msg!==""){
	alert(' '.concat(create_success_msg));
}
</script>


</html>
