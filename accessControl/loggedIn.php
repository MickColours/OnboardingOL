<?php


function Allowed() {

$loggedIn = $_SESSION['loggedIn'];
  //redirect users who are not logged in to the login page
  if (1==1){
    header("Location: /login/login.php");
  }
}

?>
