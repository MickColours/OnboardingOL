<html>
<!-- Author: Matt 
This file executes php code that calls a canned database function verifyLogin with
the credentials that are provided by the user.
If verifyLogin returns 1, that means they provided a valid user name and authentication string.
Therefore we store there credentials in a session variable and redirect them to the homepage.
Otherwise if verifyLogin returns  0 and we redirect them to the login page.

This functionality is carried out using PHP-PDO in conjuction with the bindParam functionality
to allow this function call to be dynamic , i.e. using any login credentials.

--> 


<?php
 session_start();
?>


<?php
	//include the function create in connectUser.php
	include '../connections/connectUser.php';
	
	#retrieve the login credentials from the form
 	$user_name = $_GET["user_name"];
	#trim trailing and leading whitespace
	$user_name = trim($user_name);
	$authentication_string = $_GET["user_password"];
	#trim trailing and leading whitespace
	$authentication_string = trim($authentication_string);
	$dbh = ConnectUser();

	$query_string = " call Asrcoo.get_authentication_string(:un);";
	$stmt = $dbh->prepare($query_string);
	$stmt->bindParam(':un', $user_name, PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetchAll();
	$result = $result[0];
	$hash = $result['hash'];
	$valid = password_verify($authentication_string,$hash);
		
	if ($valid){
		//note with header, it will not work if you output content before user
		//redirection
		//retrieve the valid login's privilege level
		$query_string2 = " call Asrcoo.get_user_privilege(:un);";
	        $stmt = $dbh->prepare($query_string2);
		$stmt->bindParam(':un', $user_name, PDO::PARAM_STR);
		$stmt->execute();
		
		$res = $stmt->fetchAll();
		$res = $res[0];
		$priv = $res['privilege']; //privilege is the name of the column that is returned from procedure call

		//retrieve the user's user_id
		$query_string3 = "call Asrcoo.get_user_id(:unn);";
                
                $stmt = $dbh->prepare($query_string3);
                $stmt->bindParam(':unn', $user_name, PDO::PARAM_STR);
                $stmt->execute();
                $res = $stmt->fetchAll();
                $res = $res[0];
                $res = $res['user_id'];

		//set the current user id
		$_SESSION['user_id']=$res;
		//set the loggedIn field to true
		$_SESSION['logged_in']=1;
		//pass user privilege
		$_SESSION['user_privilege']=$priv;
		//pass user name -Victor
		$_SESSION['user_name']=$user_name;
		//pass username
		$_SESSION['welcome_msg']= "Welcome ". $user_name;
		header("Location: /homepage/homepage.php");
	}else{
		$_SESSION['login_error_msg']='Invalid credentials.';
		header("Location: ../login.php");
	}
	 

?>

</html>
