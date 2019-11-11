<!-- test the sha256 encryption algo 

	password_hash is a built in function in php
	that salts and hashes a password
	the output of pass_word hash embedds the salt
	and hashing algorithm

	so a call to password_verify (another in built function)
	knows how see if a given plaintext password will
	match up to its hash

	I use password_hash using the BCRYPT algorithm
	which has a constraint of 72 characters



-->

<?php

$password='debug';
echo password_hash($password, PASSWORD_BCRYPT);




?>
