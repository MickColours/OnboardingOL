<?php
//this script destroys the session variable (functionally logging them out)
//and redirects the user to the login page


//load session (necessary?)
session_start();
//destroy session
session_destroy();
//redirect to login page
header("Location: /login.php");

?>
