<!-- allows data transfer through session -->
<?php
session_start();

#redirects users who are not logged in
include '../accessControl/loggedIn.php';
Allowed();

#includes the HTML code for the navigation bar
include '../homepage/navBar.php'
?>
<!-- allows data transfer through session -->

<html>
  <head>
    <title>Create a Quiz | AFMS Online Onboarding Learning Resource</title>
    <!-- Links the CSS code -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>

  <body>
    <!-- creates a container that will display the contents of the page -->
    <div class="container">
      <h1 id="tableHeading">Create a Quiz</h1>
    </div>
  </body>
</html>

