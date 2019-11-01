<?php
/*
 *Author - Matt
 *
 *This PHP script declares a function ConnectUser that returns
 a php PDO (a object to interface with a database ) of user (anyone who wants to access login page)  level privilege
 of the Asrcoo database
 */
function ConnectUser() {
        $hostname = '127.0.0.1';
        $username = 'user';
        $password = 'Blueballs55';
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
