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

<div class="container" id="main-content">
<br>
	<h2 style="text-align:center;">Job Posting Website</h2>
	<h6 style="text-align:center;">We're here to help you find a job!</h6>
	<br>


	<p style="text-align:center;">
		<a href="view.php">View Job Postings</a>
	</p>
	<p style="text-align:center;">

		<a href="create.php">Create Job Posting</a>
	</p>
	<br>

</div>
<?php
mysqli_close($dbc); // Close the database connection.
include_once ('../includes/footer.php');
?>
</body>
</html>


