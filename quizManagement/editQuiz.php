<?php include "../homepage/homepage.php";
session_start();
?>
<html>
  <body>
    <link rel="stylesheet" type="text/css" href="/css/style_edit_quiz.css">
    <h1> Edit a Quiz </h1>
    <div class="box">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Quizzes">
      <table id="quizTable">
	<tr class="tableHeader">
	  <th>Quiz Name</th>
	  <th><!-- Intentionally left blank --></th>
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
      for (i = 0; i < tr.length; i++) {
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

