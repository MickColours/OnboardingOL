<?php 
/*
 * Author - Matt
 *This PHP script declares a function ConnectAdmin that returns 
 a php PDO (a object to interface with a database ) of admin level privilege
 of the Asrcoo database
 */
function ConnectAdmin() {
	$hostname = '127.0.0.1';
	$username = 'admin';
	$password = 'Flower33';
	$dbname = 'Asrcoo';

	try {
		$dbh = new PDO("mysql:$hostname;dbname=$dbname",
				$username, $password);
	}
	catch(PDOException $e) {
		echo "Error connecting to Asrcoo DB";
	}

	return $dbh;
}

?>


