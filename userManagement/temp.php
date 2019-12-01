<!DOCTYPE html>
<!--
Author:Matt Formatted by: Victor

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
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
    <body>
      <div id="uploadFileBox" class="container">
	<h1 id="quizInfoHeader">Manage User</h1>
	<div id="mentorCheckbox">

	<?php 

	include '../connections/connectUser.php';
	session_start();
	
	$inspected_user_name = $_GET['inspected_user_name']; 
	$inspected_user_id = $_GET['inspected_user_id'];
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
	echo "<input type='checkbox' class='createUserCheckbox' id='createUserCheckbox' name='mentorCheckbox' value='Mentor' checked>Mentor</input>";
	} else{
	echo "<input type='checkbox' class='createUserCheckbox' id='createUserCheckbox' name='mentorCheckbox' value='Mentor'>Mentor</input>";
	}
?>
	</div>
      </div>
	<form action='../???' method="get" name="view_metrics">
	  <input id='submit_view_metrics' class='button' type="submit" style="width:100px" value="View Metrics"/>
	</form>
	<form action='changePassword.php' method="get" name="change_password">
	  <input id='submit_change_password' class ='button' style="width:120px" type="submit"  value="Change Password"/>
	</form>
	<!-- Delete User -->
	<input onclick="confirmDelete();" id='submit_delete_user' class='button' type = "button"  value="Delete User"/>
  	<input type='hidden' id='inspected_user_id' name='inspected_user_id' value='<?php echo $inspected_user_id ?>'/>
	<input type='hidden' id='inspected_user_name' name='inspected_user_name' value='<?php echo $inspected_user_name ?>'/>
      </div>
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
	</script>

  </body>
</html>

