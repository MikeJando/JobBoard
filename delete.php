<?php 
include ('../includes/session.php');
require_once ('../../mysqli_connect.php'); // Connect to the db.    
include_once ('../includes/header.php');
?>
<br>

<?php

$jid = $_GET['did'];

if($_SESSION['user_type_id'] == '3')
{
	$sql = "DELETE FROM Jobs WHERE id = '$jid'";

	if (mysqli_query($dbc, $sql) && $_SESSION['user_type_id'] == '3') 
	{
    		header("Location: view.php"); 
    		exit;
	}   
	else
	{
    	echo "Error deleting record";
	}
}
else
{
	echo "Must be an Administrator to Delete";
}

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
