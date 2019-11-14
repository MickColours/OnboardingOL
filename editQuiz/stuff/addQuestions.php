<?php
	session_start();
	include '../homepage/navBar';
?>

<html>
    <head>
  	<title>AFMS Online Onboarding Learning Resource</title>
   	<link rel="stylesheet" type="text/css" href="/css/style.css">
   </head>
  <body>
    <div class="container" id="quizInfoContainer">
    <h1 id='quizInfoHeader'>Add Questions</h1>
    <p class='info'><strong>Question Type: </strong> <select name = 'questionDropdown'>
							     <option value = "Multiple Choice"> Multiple Choice </option>
							     <option value = "Select All That Apply"> Select All That Apply </option>
							     <option value = "Free Response"> Free Response </option>	
						     </select> </p>
    <p class='info'><strong>Question Text: </strong> <textarea name = 'Question Text' rows = '4' cols = '50'  id = 'quiz_drop_down'> </textarea>  </p>
	
    

    <form action=''>
      <input id = "saveButton" type="submit" value="Save & Submit"/>
    </form>

    <form action=''> 
      <input id='submitButton' class='button' type='submit' value='Add Question'/>
    </form>

    </div>
  </body>
</html>

