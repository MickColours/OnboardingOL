<!DOCTYPE html>
<!--
Author:Matt 
Desc:This page is the view user page. It corresponds to 
 It corresponds to this view in the prototype 
 https://xd.adobe.com/view/0c08b808-171f-4220-6e37-bbdb03b3aec9-7a39/screen/c6593e88-7ff1-492c-80a1-5f7b0cf1c5d0/Viewing-a-User

Upon arrival from the manageUser.php page from a clicked button
The php $_SESSION variable is loaded and the inspect_user_id is retrieved
from it

#TODO : figure out how to confirm user deletion!

-->

<!-- allow data transfer through session variables -->
<?php session_start(); ?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ASRC Onboarding</title>
  <!-- <link rel="stylesheet" type="text/css" href="/css/style_login.css"> -->
</head>

<body>
<table>

<!-- retrieve the name of the currently inspected user and print out a div with it-->
<tr>
<?php 
$inspected_user_name = $_GET['inspected_user_name']; 
$inspected_user_id = $_GET['inspected_user_id'];
echo "<div> Viewing user " . $inspected_user_name  . " with  user_id : " . $inspected_user_id . "  </div>"
?>
</tr>

<tr>
<!-- View Metrics -->
<td>
<form action='../???' method="get" name="view_metrics">
    <input id='submit_view_metrics' class='button' type="submit"  value="View Metrics"/>
 </form>
</td>

<!-- Change Password ??? why -->
<td>
<form action='../???' method="get" name="change_password">
    <input id='submit_change_password' class='button' type="submit"  value="Change Password"/>
</form>
</td>

<!-- Delete User -->
<td>
<form action='./deleteUser.php' method="get" name="delete_user">
    <input id='submit_delete_user' class='button' type="submit"  value="Delete User"/>
    <input type='hidden' id='inspected_user_id' name='inspected_user_id' value='<?php echo $inspected_user_id ?>'/>
    <input type='hidden' id='inspected_user_name' name='inspected_user_name' value='<?php echo $inspected_user_name ?>'/>
 </form>
</td>

</tr>
</table>

</body>


</body>
</html>


