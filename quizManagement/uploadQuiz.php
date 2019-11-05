<?php
include "../accessControl/allowedUser.php"
Allowed();
include "../homepage/navBar.php";
session_start();
?>


<link rel="stylesheet" type="text/css" href="/css/style.css">
<html>
   <head>
      <title>Upload multiple files</title>
   </head>
  <div class="container" id="uploadFileBox">
  <h1 class="h1"> Upload a Quiz </h1>

   <body>
      <form>
        <h1 class="h1"><br>After uploading your csv file click Submit<br></h1>
	<div class="inputContainer">
	 <input type="file" name="name" single><br>        
	 <input class ='button' type="submit" value="Submit" id="submitButton" style="width:95%;margin-right:9px;">
	</div>
      </form>
   </body>
  </div>
</html>
