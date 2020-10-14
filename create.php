<?php 
include ('../includes/session.php');
require_once ('../../mysqli_connect.php'); // Connect to the db.    
include_once ('../includes/header.php');
?>

<?php

if (isset($_POST['submitted']))
{
	$errors = array();

	if(!($_SESSION['user_type_id'] == '3' || $_SESSION['user_type_id'] == '2'))
	{
		$errors[] = 'Must be an Administrator or User to create a job posting!';
	}	

	if (empty($_POST['title'])) 
    	{
		$errors[] = 'Please enter Job Title.';
    	}
    	else 
    	{
		$title = mysqli_real_escape_string($dbc, trim($_POST['title']));
    	}


    	if (empty($_POST['cname'])) 
    	{
		$errors[] = 'Please enter Company Name.';
    	}
    	else 
    	{
		$cname = mysqli_real_escape_string($dbc, trim($_POST['cname']));
	}
	

    	if (empty($_POST['type'])) 
    	{
		$errors[] = 'Please enter Employment Type.';
    	} 
    	else
    	{
		$type = mysqli_real_escape_string($dbc, trim($_POST['type']));
    	}


    	if (empty($_POST['seniority'])) 
    	{
		$errors[] = 'Please enter Seniority Level.';
    	} 
    	else 
    	{
		$seniority = mysqli_real_escape_string($dbc, trim($_POST['seniority']));
    	}


    	if (empty($_POST['salary'])) 
    	{
		$errors[] = 'Please enter Annual Salary.';
    	} 
    	else 
    	{
		$salary = mysqli_real_escape_string($dbc, trim($_POST['salary']));
    	}


    	if (empty($_POST['contact'])) 
    	{
		$errors[] = 'Please enter Email Address.';
    	} 
    	else 
    	{
		$contact = mysqli_real_escape_string($dbc, trim($_POST['contact']));
    	}

    	if (!empty($_POST['information'])) 
    	{
		$information = mysqli_real_escape_string($dbc, trim($_POST['information']));
    	}


    	if (empty($errors)) 
    	{ 

		
        
		$q = "INSERT INTO Jobs (title, cname, type, seniority, salary, contact, information) VALUES ('$title', '$cname', '$type', '$seniority', '$salary', '$contact', '$information')";		
        	$r = @mysqli_query ($dbc, $q);
		if ($r) 
		{
			echo '<h1>Job Has Been Posted.</h1><p>Thank you!</p><p><br /></p>';
        	}
		else 
		{
			echo '<h1>System Error</h1>'; 
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p></div></div></body></html>';
        	}
		
	}
	else 
	{
		echo '<h1>Error</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) 
		{                    
			echo " - $msg<br />\n";
		}
		echo '</p><p>Error, please contact the system administrator or try again.</p><p><br /></p>';
    	}
}

mysqli_close($dbc); 
?>


<html>
<head>
<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>

<div>
<form action="create.php" method="post">
<br>

<h2 style="text-align: center;">Create a Job Posting</h2>
<p>Please fill out the form below to create a new job posting.</p>
<p><br /> </p>
<div align="center">
<form action="/action_page.php" method="post">
	<label for="title">Job Title: </label> <input id="title" name="title" type="text"/>
	<br/><br/> 
	<label for="cname">Company Name: </label> <input id="cname" name="cname" type="text"/>
	<br /><br /> 
	<label for="type">Employment Type: </label><select id="type" name="type">
		<option value="Full-time">Full-time</option>
		<option value="Part-time">Part-time</option>
		<option value="Temporary">Temporary</option> 
	</select>
	<br /><br />
	<label for="seniority">Seniority level: </label><select id=:"seniority" name="seniority">
		<option value="Entry-Level">Entry-Level</option>
		<option value="Mid-Level">Mid-Level</option>
		<option value="Senior-Level">Senior-Level</option> 
		<option value="Management">Management</option> 
	</select>
	<br /><br />
	<label for="salary">Annual Salary (USD): </label><input id="salary" name="salary" type="number" step=1000 min = 10000 max = 500000 />
	<br /><br />
	<label for="contact">Email Address: </label><input id="contact" name="contact" type="text" />
	<br /><br />
	<label for="information">Additional Information: </label><input id="information" name="information" type="text" />
	<br /><br />
	<input type="hidden" name="submitted" value="TRUE" />
	<input type="submit" value="Submit" />
</form>
</div>

<br>
	<p style="text-align:center;">
		<a href="index.php">Go to Home Page</a>
	</p>

</div>
<?php
mysqli_close($dbc); // Close the database connection.
include_once ('../includes/footer.php');
?>
</body>
</html>
