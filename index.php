<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US"> 

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> 
		Vehicle Registration for Las Colinas 
	</title>


	<style>
		.error {color: #FF0000;}
	</style>

	<!-- Include CSS for different screen sizes -->
	<link rel="stylesheet" type="text/css" href="defaultstyle.css">
</head>

<body>

<?php
	
	require 'connectToDatabase.php';

	// Connect to Azure SQL Database
	//$conn = ConnectToDabase();

	// Get data for expense categories

	// Populate dropdown menu options 
//	$options = '';
//	while($row = sqlsrv_fetch_array($expenseCategories)) {
//		$options .="<option>" . $row['CATEGORY'] . "</option>";
//	}

	// Close SQL database connection
	//sqlsrv_close ($conn);

	// Get the session data from the previously selected Expense Month, if it exists
	session_start();
	if ( !empty( $_SESSION['prevSelections'] ))
	{ 
		$prevSelections = $_SESSION['prevSelections'];
		unset ( $_SESSION['prevSelections'] );
	}

	// Extract previously-selected Month and Year
//	$prevExpenseMonth= $prevSelections['prevExpenseMonth'];
//	$prevExpenseYear= $prevSelections['prevExpenseYear'];
?>

<div class="intro">

	<h2> Car Information Form </h2>

	<!-- Display redundant error message on top of webpage if there is an error -->
	<!--<h3> <span class="error"> <?php echo $prevSelections['errorMessage'] ?> </span> </h3>-->

</div>

<!-- Define web form. 
The array $_POST is populated after the HTTP POST method.
The PHP script insertToDb.php will be executed after the user clicks "Submit"-->
<div class="container">
	<form action="insertToDb.php" method="post">

		<label>Vehicle Make:</label>
		<input type="text"  name="vehicleMake" required><br>
		<br>
		<label>Vehicle Model:</label>
		<input type="text" name="vehicleModel" required><br>
		<br>
		<!-- Text input for the day start and end -->
		<label>Start Date (MMDDYY):</label>
		<input type="text" name="startDay" required><br>
		<br>
		<label>End Date (MMDDYY):</label>
		<input type="text"  name="endDay" required><br>
		<br>
		<label>Employee Name:</label>
		<input type="text" name="employeeName" required>
		<br>
		<button type="submit">Submit</button>
	</form>
</div>



</body>
</html>
