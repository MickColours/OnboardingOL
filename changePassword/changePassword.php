<html>
 <head> <title> Change Password </title> </head>
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <div id="createUserBox" class="container">
    <h1 id="tableHeading"> Change Password </h1>

    <form action='../???' method="post" name="change_user_password">

     <input id="enterEmail" class="createUserForm" type="email" name="email"
     placeholder="Enter email address">
     
     <?php

	/*
	$toEmail = 'fadair40@gmail.com';
	$subject = 'something';
	$message = 'something else';
	//$headers = 'From: noreply @ company.com';
	mail($toEmail,$subject,$message);
	 */

	?>

	<?php
	$sender = '';
	$recipient = 'fadair40@gmail.com';

	$subject = "php mail test";
	$message = "php test message";
	$headers = 'From:' . $sender;

	if (mail($recipient, $subject, $message, $headers))
	{
	    echo "Message accepted";
	}
	else
	{
	    echo "Error: Message not accepted";
	}
	?>

     

     <div>
     <input id="submitButton" class='button' style="width:320px" type="submit" value="Send Email" name="submit"/>
     </div>

    </form>

    <?php
      
      if(isset($_POST['submit']))
	{
   	   mail($to_email,$subject,$message,$headers);
	} 	
    ?>

  </div>
</html>

