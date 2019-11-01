<!DOCTYPE html>
<html>
<!--Author: Frank , Matt 
The below code takes the form data to the file addUser.php 
This php script will check to see if the fields below are in agreement
And not null. If so the Asrcoo.add_user procedure is executed with admin
privilege. If the data was not valid an error message is set and opened upon redirection 
to this page as mentioned below.
-->

  <head> <title> Create a User </title> </head>
  <link rel="stylesheet" type="text/css" href="/css/style_user_manage.css">
  <link rel="stylesheet" type="text/css" href="/css/style_buttons.css">
  <div class="box">
    <h1 class = "h1"> Create a New User </h1>
    
 <form action='validateCreateUser.php' method="get" name="add_user_request">

    <input class="input" type="text" name="user_name"
    placeholder="Enter employee's email">
    
    <input class="input" type="text" name="re_user_name"
    placeholder="Re-enter employee's email">
    
    <input class="input" type="password" name="password"
    placeholder="Type desired password">
    
    <input class="input" type="password" name="re_password"
    placeholder="Re-type desired password">
   
    <input id = "submit" class='button1' type="button" value="Cancel"/>
    <input id="submit" class='button2' type="submit" value="Create User"/>
  </div>
 </form>

<!--Display error message from addUser.php if any
Below I'm utilizing message passing through the session variable belonging to
php. The php file addUser.php sets a Session field called 'add_user_error'
When this page is serviced, the below script executes a php subscript that 
prints out the value of the add_user_error in the session variable, clears that field,then passes
it javascript to check if it is not null.
If so an alert tells the user of there error
-->
 <script>
var err_msg='<?php
session_start();
//unpack error msg if any
$error = $_SESSION['add_user_error_msg'];
//clear error msg to not be bombarded with unnecessary messages
 unset($_SESSION['add_user_error_msg']);
 echo $error;?>'

if (err_msg!==""){
	alert(' '.concat(err_msg));
}
</script>

 
</html>
