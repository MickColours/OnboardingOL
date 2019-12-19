<?php
include '../homepage/navBar.php';
?>
<html>
  <head>
    <title>Quiz Metrics | AFMS Online Onboarding Learning Resource</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <body>
	
        <?php

	//retrieve table data for grade and duration statistics

	$quiz_id = $_GET['inspected_quiz_id'];
	$quiz_name = $_GET['inspected_quiz_name'];

        include '../connections/connectAdmin.php';
        session_start();

        $dbh = ConnectAdmin();

	$query_string = "call Asrcoo.descriptive_stats_quiz(:qid);";

	$sth = $dbh->prepare($query_string);
	$sth->bindParam(':qid',$quiz_id, PDO::PARAM_INT);
        $sth->execute();

        
	$result =$sth->fetchAll();
	$result=$result[0];

	//grade table string
	$table_string= " ";
        $table_string .= "<tr>\n";
        $table_string .= "<td>" . $result['min_grade'] ."</td>\n";
        $table_string .= "<td>" . $result['max_grade'] ."</td>\n";
	$table_string .= "<td>" . $result['avg_grade'] ."</td>\n";
	$table_string .= "<td>" . $result['std_grade'] ."</td>\n";
	$table_string .= "</tr>\n";

	//duration table string
	$table_string2=" ";	
	$table_string2 .= "<tr>\n";
        $table_string2 .= "<td>" . $result['min_duration'] ."</td>\n";
        $table_string2 .= "<td>" . $result['max_duration'] ."</td>\n";
	$table_string2 .= "<td>" . $result['avg_duration'] ."</td>\n";
	$table_string2 .= "<td>" . $result['std_duration'] ."</td>\n";
	$table_string2 .= "</tr>\n";

?>
	<div class="container">
	<h1 id="tableHeading">Metrics for Quiz: <?php echo $quiz_name ?></h1>

	<table class="displayTable" id="quizTable">
	  <h2> Quiz Grade </h2>
	</tr>	
        <tr id="headerRow">
          <th style="width:25%;">Min</th>
	  <th style="width:25%;">Max</th>
	  <th style="width:25%;">Average</th>
	  <th style="width:25%;">Standard Deviation</th>
	</tr>

        <tr>
	<?php echo $table_string; ?>	
      </table>

	<table class="displayTable" id="quizTable">
	<tr id="nameRow">
	  <h2> Quiz Duration in minutes </h2>
	</tr>	
        <tr id="headerRow">
          <th style="width:25%;">Min</th>
	  <th style="width:25%;">Max</th>
	  <th style="width:25%;">Average</th>
	  <th style="width:25%;">Standard Deviation</th>
        </tr>
        <tr>
	<?php echo $table_string2; ?>	
      </table>

    </div>
  </body>
</html>
