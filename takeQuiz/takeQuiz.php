<?php 
include "../homepage/navBar.php"; 
session_start();
?>
<html>
  <head>
    <title>AFMS Online Onboarding Learning Resource</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <body>
    <div class="container">
      <h1 id="tableHeading">Take a Quiz </h1>
      <table class="displayTable">
        <tr id="headerRow"> 
	  <th>Quiz Name</th>
	  <th>Quiz Author</th>
	  <th>Date Created</th>
	  <th>
	    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Quizzes">
          </th>
	</tr>
	<tr>
	  <td>Placeholder</td>
	  <td>Placeholder</td>
	  <td>4/20/2069</td>
	  <td>
	    <button type="button">Button</button>
	  </td>
	</tr>
	<tr>
	  <td>Placeholder</td>
	  <td>Placeholder</td>
	  <td>4/20/2069</td>
	  <td>
	    <button type="button">Button</button>
	  </td>
	</tr>
	<tr>
	  <td>TestPlaceholder</td>
	  <td>Placeholder</td>
	  <td>4/20/2069</td>
	  <td>
	    <button type="button">Button</button>
	  </td>
	</tr>
      </table>
    </div>
    <script>
    function myFunction() {
      // Declare variables
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("quizTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 1; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
       }
      }
     }
    }
    </script>
  </body>
</html>

