<?php 
include "../homepage/homepage.php";
session_start();
?>


<link rel="stylesheet" type="text/css" href="/css/style_user_manage.css">
<link rel="stylesheet" type="text/css" href="/css/style_buttons.css">
<html>
   <head>
      <title>Upload multiple files</title>
   </head>
  <div class="box">
  <h1 class="h1"> Upload a Quiz </h1>

   <body>
      <form>
        <h1 class="h1"><br>After uploading your csv file click Submit<br></h1>
	<div class="inputContainer">
	 <input type="file" name="name" single><br>        
	 <input class ='button2'input type="submit" value="Submit">
	</div>
      </form>
   </body>
  </div>
</html>
