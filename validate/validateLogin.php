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
	$user_id = $_GET["user_name"];
	$authentication_string = $_GET["user_password"];  
	$dbh = ConnectUser();

	//note Asrcoo.verifyLogin() should be recoded as a procedure since by defintion it
	//is not a function

	
	//build query string
	$query_string = " select Asrcoo.verifyLogin(:uid,:as) as result";
	$stmt = $dbh->prepare($query_string);
	
	//since our query dynamically changes based on the user input
	//we must use bindParam to substitute the php variabls into
	//the query string we constructed and prepared
	
	$stmt->bindParam(':uid', $user_id, PDO::PARAM_STR); //dereference :uid
	$stmt->bindParam(':as', $authentication_string, PDO::PARAM_STR); //dereference :as


	$stmt->execute();
	#queries return arrays of arrays, this function returns a scalar  so 

	//retrieve data matrix from query
	$result =$stmt->fetchAll();
	//index the first (and only row returned from this function)
	$result = $result[0];
	//index the field I called this 'result' as indicated in query_string 
	$result = $result['result'];
	
	if ($result==1){
		//note with header, it will not work if you output content before user
		//redirection
		
		//retrieve the valid login's privilege level
		$query_string2 = " call Asrcoo.get_user_privilege(:un)";
	        $stmt = $dbh->prepare($query_string2);
		$stmt->bindParam(':un', $user_id, PDO::PARAM_STR);
		$stmt->execute();
		$res = $stmt->fetchAll();
		$res = $res[0];
		$res = $res['privilege']; //privilege is the name of the column that is returned from procedure call
		//set the loggedIn field to true
		$_SESSION['loggedIn']=true;
		//pass user privilege
		$_SESSION['user_privilege']=$res;
		//pass username
		$_SESSION['welcome_msg']="Welcome ". $user_id;
		header("Location: /homepage/homepage.php");
	}else{
		$_SESSION['login_error_msg']='Invalid credentials.';
		header("Location: login.php");
	}
	 

?>

</html>
