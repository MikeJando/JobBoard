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
	<h2 style="text-align:center;">Job Details</h2>
	<br>
</div>



<?php

$jid = $_GET['did'];

$jobs = array();
$q = "SELECT id, Title, cName, Type, Seniority, Salary, Contact, Information FROM Jobs WHERE id = '$jid'";
$result = mysqli_query($dbc, $q);

while($rowb = mysqli_fetch_assoc($result)) {
	$jobs[] = $rowb;
	}


	
echo '<table align="center" cellspacing="2" cellpadding="2.0" width="70%" border="1">
			
	<tr>
	<td align="center"> <b>Job Title</b></td>
	<td align="center"> <b>Company Name</b></td>
	<td align="center"> <b>Employment Type</b></td>
	<td align="center"> <b>Seniority Level</b></td>
	<td align="center"> <b>Annual Salary (USD)</b></td>
	<td align="center"> <b>Email Address</b></td>
	<td align="center"> <b>Additional Information</b></td>
	</tr>';
	
	foreach($jobs as $job){
		echo '<tr>
		<td align="left">' . $job['Title'] . '</td>
		<td align="left">' . $job['cName'] . '</td>	
		<td align="left">' . $job['Type'] . '</td>
		<td align="left">' . $job['Seniority'] . '</td>
		<td align="left">' . $job['Salary'] . '</td>
		<td align="left">' . $job['Contact'] . '</td>
		<td align="left">' . $job['Information'] . '</td>
		</tr>';
	}

	echo '</table>';

?>























<br>
<br>

	<p style="text-align:center;">
		<a href="view.php">Go Back</a>
	</p>



<?php
mysqli_close($dbc); // Close the database connection.
include_once ('../includes/footer.php');
?>
