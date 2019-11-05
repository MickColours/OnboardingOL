<!DOCTYPE html>

<html>
<!-- Authors: [ Frank* , Matt ] -->
<!-- Structure (frank) debugging (matt) -->
 <link rel="stylesheet" type="text/css" href="/css/style_user_manage.css">
 <link rel="stylesheet" type="text/css" href="/css/style_buttons.css">
 <link rel="stylesheet" type="text/css" href="/css/style_general_table.css">

 <div class = "manageUserBox">
  <head>
    <title>View Users</title>
  </head>
  <body>
    <form action='/homepage/homepage.php'>
    <input class = "button1" id = "cancel" class='button1' type="submit" value="Cancel"/>
    </form>

    <form action='/userManagement/createUser.php'>
    <input class = "button2" type = "submit" value = "Create User" id = "create_user"/>
    </form>


    <!-- search bar-->
    <br><input class = "input" type="text" id="searchBar" onkeyup="searchUsers()" placeholder="Search users..">

	<!-- user info table -->
    <div class="box">
    <h1>User List</h1>
    <table id="generalTable">
		<!-- column names -->
	    <tr class="tableHeader">
	        <th style="width:70%;">User Name</th>
                <th style="width:50%;">

			<input class = "input" type="text" id="searchBar" onkeyup="searchUsers()" placeholder="Search users..">

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
			$table_string .= " <form action='manageUser.php' method='get' name='view_user'> "; 
			$table_string .= " <input id='submit' class='button' type='submit' value='view user'/> ";
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
   </div>
   </div>
<!-- grab the deletion_success_message and print it if its not empty -->
<script language="javascript">
var deletion_success_message='<?php
$deletion_success_message = $_SESSION['deletion_success_message'];
unset($_SESSION['deletion_success_message']);
echo $deletion_success_message;
?>';
if (deletion_success_message!==""){
alert(' '.concat(deletion_success_message));
}
</script>


<script>
//Search function for user table
function searchUsers() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchBar");
  filter = input.value.toUpperCase();
  table = document.getElementById("generalTable");
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

<script>
//Script to redirect admin to the create a new user page
//after click the Create a New User button
    document.getElementById("create_user").onclick = function () {
        location.href = "";
    };
</script>

  </body>
</html>
