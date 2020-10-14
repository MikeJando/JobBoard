<?php 
include ('../includes/session.php');
require_once ('../../mysqli_connect.php'); // Connect to the db.    
include_once ('../includes/header.php');
?>

<html>
<head>
<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>

<div class="view" id="view">
<br>
	<h2 style="text-align:center;">View Job Postings</h2>
	<br>
</div>


<?php

$jobs = array();
$q = "SELECT id, Title, cName, Type, Seniority, Salary, Contact, Information FROM Jobs";
$result = mysqli_query($dbc, $q);

while($rowb = mysqli_fetch_assoc($result)) {
	$jobs[] = $rowb;
	}


	
echo '<table align="center" cellspacing="2" cellpadding="2.0" width="25%" border="1">
			
	<tr>
	<td align="center"> <b>Job Title</b></td>
	<td align="center"> <b>Delete Posting</b></td>
	</tr>';
	
	foreach($jobs as $job){
		echo '<tr>
		<td align="left"><a href="details.php?did=' . $job['id'] . '">' . $job['Title'] . '</a></td>
		<td align="left"><a href="delete.php?did=' . $job['id'] . '">Delete</a></td>
		</tr>';
	}

	echo '</table>';


?>
<br>
	<p style="text-align:center;">
		<a href="index.php">Go to Home Page</a>
	</p>


<?php
mysqli_close($dbc); // Close the database connection.
include_once ('../includes/footer.php');
?>
</body>
</html>
