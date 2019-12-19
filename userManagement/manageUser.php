<!DOCTYPE html>
<!--
Author:Matt,Frank 
Desc:This page is the view user page. It corresponds to 
 It corresponds to this view in the prototype 
 https://xd.adobe.com/view/0c08b808-171f-4220-6e37-bbdb03b3aec9-7a39/screen/c6593e88-7ff1-492c-80a1-5f7b0cf1c5d0/Viewing-a-User

Upon arrival from the manageUser.php page from a clicked button
The php $_SESSION variable is loaded and the inspect_user_id is retrieved
from it

-->

<!-- allow data transfer through session variables -->
<?php 
session_start(); 
#redirect users who are not logged In
include '../accessControl/loggedIn.php';
Allowed();
include '../accessControl/adminLoggedIn.php';
Admin();

include '../homepage/navBar.php';

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ASRC Onboarding</title>
  <!-- <link rel="stylesheet" type="text/css" href="/css/style_login.css"> -->
</head>

<body>
    <div class="container" id="viewUserContainer">
      <h1 id="viewUserHeader">View User</h1>
<?php 

include '../connections/connectUser.php';
session_start();

$inspected_user_name = $_GET['inspected_user_name']; 
$inspected_user_id = $_GET['inspected_user_id'];

echo "<div class='quizInformation'>\n";
echo "<p class='info'><strong>Currently Viewing: </strong>" . $inspected_user_name  . "</p>\n</div>";
echo "<div class='quizInformation'>\n";
echo "<p class='info'><strong>User ID: </strong>" . $inspected_user_id . "</p>\n</div>";

$dbh = ConnectUser();
$query_string = " call Asrcoo.get_user_privilege(:un); ";
$sth = $dbh->prepare($query_string);
$sth->bindParam(':un', $inspected_user_name, PDO::PARAM_STR);
$sth->execute();

//This table string is the user's priv
//if it is equivalent to 1 that user is an employee
//if it is equivalent to 2 that user is a mentor
$table_string = "";

$result = $sth->fetchAll();
$result = $result[0];

$table_string = $result['privilege'];

$stripped = trim($table_string);

if($table_string == "2"){
	echo "<div class='quizInformation'>\n";
	echo "<p class='info'><strong>Mentor Status: </strong> <input type='checkbox' class='createUserCheckbox' id='createUserCheckbox' name='mentorCheckbox' value='Mentor' checked></input></p></div>";
} else{
	echo "<div class='quizInformation'>\n";
	echo "<p class='info'><strong>Mentor Status: </strong> <input type='checkbox' class='createUserCheckbox' id='createUserCheckbox' name='mentorCheckbox' value='Mentor'></input></p></div>";
}
 
?>
<br>
<table style="width:100%; text-align:center;">
<tr>
<td>
<!-- Change password -->
<form action='changePassword.php' method="get" name="change_password">
    <input type='hidden' name='inspected_user_id' value='<?php echo $inspected_user_id ?>'/>
    <input id='submit_change_password' class ='button' style="width:120px" type="submit"  value="Change Password"/>
</form>
</td>
<td>
<!-- Delete User -->
    <input onclick="confirmDelete();" id='submit_delete_user' style="width:100px;" class='button' type = "button"  value="Delete User"/>
    <input type='hidden' id='inspected_user_id' name='inspected_user_id' value='<?php echo $inspected_user_id ?>'/>
    <input type='hidden' id='inspected_user_name' name='inspected_user_name' value='<?php echo $inspected_user_name ?>'/>
</td>
<td>
<!-- Change Privilege -->
   <input type='hidden' name='inspected_user_id' value='<?php echo $inspected_user_id ?>'/>
   <input type='hidden' name='inspected_user_name' value='<?php echo $inspected_user_name ?>'/>
   <input onclick="confirmChangePrivilege();" id='submit_change_password' class ='button' style="width:130px" type="submit"  value="Change Privilege"/>
</td></tr></table> 
	<script type="text/javascript">
	//This function will ask the admin whether or not 
	//they would like to continue deleting the user
	//this comes in the form of a pop up box
	function confirmDelete() {

	var res = confirm("Do you really wish to delete this user?");

	if(res){
		location.href='deleteUser.php?<?php echo "inspected_user_id=" .  $inspected_user_id . "&inspected_user_name=" . $inspected_user_name ?>'; 
	       }
	}
	
	//This function creates an alert box that
	//will ask the admin whether or not they
	//want to continue changing the privilege
	//of the user
	function confirmChangePrivilege() {

	var res = confirm("Do you really wish to change this user's privilege?");

	if(res){
		location.href='changePrivilege.php?<?php echo "inspected_user_id=" .  $inspected_user_id . "&inspected_user_name=" . $inspected_user_name ?>';
	       }
	}
		
	</script>
</body>
</html>

