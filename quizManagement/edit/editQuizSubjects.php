<?php
#includes the HTML code for the navigation bar
include "../../homepage/navBar.php";
session_start();

#redirects guests who are not logged in
include '../../accessControl/loggedIn.php';
Allowed();
?>

<html>
  <head>
    <title>Edit Quiz Overview | AFMS Online Onboarding Learning Resource</title>
    <!-- Links the CSS code -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
<body>
<div class="container">

<!-- Subjects that are only in quiz -->
 <table class="displayTable" id="subjectTable">
        <tbody>
        <tr id="headerRow">
          <th style="width:40%">Subject</th>
          <!-- <th>Author</th> As of now , the data relies on a query that assumes the user is the author
                ergo, author is not needed , may change in the future Matt -->
          <th>
            <!-- creates a tet box with the functionality of a search box -->
            <input type="text" id="searchBox" onkeyup="myFunction()" placeholder="Search Subjects">
          </th>
        </tr>
        <tr>
          <td> Math </td>
          <td> <input id="submit" class="button" type="submit" value="Delete"> </td>
        </tr>
        <tr>
          <td> Moth </td>
          <td> <input id="submit" class="button" type="submit" value="Delete"> </td>
        </tr>
        </tbody>
      </table>


<!-- All subjects -->
 <table class="displayTable" id="subjectTable">
        <tbody>
        <tr id="headerRow">
          <th style="width:40%">Subject</th>
          <!-- <th>Author</th> As of now , the data relies on a query that assumes the user is the author
                ergo, author is not needed , may change in the future Matt -->
          <th>
            <!-- creates a tet box with the functionality of a search box -->
            <input type="text" id="searchBox" onkeyup="myFunction()" placeholder="Search Subjects">
          </th>
        </tr>
        <tr>
          <td> Math </td>
          <td> <input id="submit" class="button" type="submit" value="Add"> </td>
        </tr>
        <tr>
          <td> Moth </td>
          <td> <input id="submit" class="button" type="submit" value="Add"> </td>
        </tr>
        </tbody>
      </table>
       

</div>
</body>
</html>
