<?php
include '../homepage/navBar.php'
?>
<html>
  <head>
    <title>Metrics By User | AFMS Online Onboarding Learning Resource</title>
    <link red="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <body>
      <div class="container" id="uploadFileBox">
        <h1 id="quizInfoHeader">User List</h1><br>
        <table class="displayTable" id="displayTable">
	<!-- column names -->
	  <tr id="headerRow">
	    <th>User Name</th>
            <th>
	      <!-- creates a text box with search box functionality -->
              <input type="text" id="searchBar" onkeyup="searchUsers()" placeholder="Search users..">
	    </th>
	  </tr>
		<?php
		//import connectAdmin() function
		include '../connections/connectAdmin.php';
		session_start();
		#retrive a PDO of an Admin logged in to Asrcoo
		$dbh = ConnectAdmin();
		#construct mysql query

		$query_string  =" select user_name, user_id ";
		$query_string .=" from Asrcoo.user "; 
		$query_string .=" order by user_name; ";
		
		#prepare and execute mysql query
		$sth = $dbh->prepare($query_string);
		$sth->execute();

		#output the results of the query in an html table,
		#where table rows correspond to rows in the Asrcoo.user table
		#and row elements are the fields of rows in the Asrcoo.user table
		#
		#Observe that mysql queries return rows of columns of data i.e a 2 dimensional array
		#the for each cycles through each row resulting from the query
		#then $row['value'] retrieves the field of interest from that row
		$table_string= " ";
		foreach ($sth->fetchAll() as $row){
			$table_string .= "<tr>\n";
			#$table_string .= "<td>" . $row['user_id'] . "</td>\n";
			$table_string .= "<td>" . $row['user_name'] . "</td>\n";
			$table_string .= " <td>";
			$table_string .= " <form action='userMetrics.php' method='get' name='view_user'> "; 
			$table_string .= " <input id='submit' class='button' type='submit' style='width:100px;' value='View Metrics'/> ";
			$table_string .= " <input type='hidden' id='inspected_user_name' name='inspected_user_name' value='" . $row['user_name'] . "'/>";
			$table_string .= " <input type='hidden' id='inspected_user_id' name='inspected_user_id' value='" . $row['user_id']  .   "'/>";
			$table_string .= "</form>";
			$table_string .= " </td>" ;
			$table_string .= "</tr>\n";
		}

		#finally echo out the html table that was constructed with the data from the query
		echo $table_string;

	?>	
    </table>

<script>
//Search function for user table
function searchUsers() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchBar");
  filter = input.value.toUpperCase();
  table = document.getElementById("displayTable");
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

