<?php
	// PHP script used to connect to backend Azure SQL database
	require 'ConnectToDatabase.php';

	// Start session for this particular PHP script execution.
	session_start();

	// Define ariables and set to empty values
	$vehicleMake = $vehicleModel = $startDate = $endDate = $employeeName = NULL;

	// Get input variables
	$vehicleMake= $_POST['vehicleMake'];
	$vehicleModel= $_POST['vehicleModel'];
	$startDate= $_POST['startDay'];
	$endDate= $_POST['endDay'];
	$employeeName= $_POST['employeeName'];

	// Get the authentication claims stored in the Token Store after user logins using Azure Active Directory


	///////////////////////////////////////////////////////
	//////////////////// INPUT VALIDATION /////////////////
	///////////////////////////////////////////////////////

	//Initialize variable to keep track of any errors

	$anyErrors= FALSE;
	///////////////////////////////////////////////////////
	////////// INPUT PARSING AND WRITE TO SQL DB //////////
	///////////////////////////////////////////////////////

	// Only input information into database if there are no errors
	if ( !$anyErrors ) 
	{
		// Connect to Azure SQL Database
		$conn = ConnectToDabase();

		// Build SQL query to insert new expense data into SQL database
		$tsql=
		"INSERT INTO parkingInfo (	
				vehicleMake,
				vehicleModel,
				startDate,
				endDate,
				employeeName
				)
		VALUES ('" . $vehicleMake . "',
				'" . $vehicleModel . "', 
				'" . $startDate . "', 
				'" . $endDate . "', 
				'" . $employeeName . "')";



		// Run query
		$sqlQueryStatus= sqlsrv_query($conn, $tsql);

		// Close SQL database connection
		sqlsrv_close ($conn);
	}

	 header("Location: /"); 
?>