<?php

	// Define function to check that inputted expense number has a maximum of 2 decimal places
	//function validateTwoDecimals($number)
//	{
//	   return (preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $number));
//	}
 
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

	// Check category validity
//	if ($expenseCategory == '-1') {$errorMessage= "Error: Invalid Category Selected"; $anyErrors= TRUE;}
	
	// Check date validity
//	$isValidDate= checkdate($expenseMonth, $expenseDay, $expenseYear);
//	if (!$isValidDate) {$errorMessage= "Error: Invalid Date"; $anyErrors= TRUE;}

	// Check that the expense amount input has maximum of 2 decimal places (check against string input, not the float parsed input)
//	$isValidExpenseAmount= validateTwoDecimals(parse_input($_POST['expense_amount']));
//	if (!$isValidExpenseAmount) {$errorMessage= "Error: Invalid Expense Amount"; $anyErrors= TRUE;}


	///////////////////////////////////////////////////////
	////////// INPUT PARSING AND WRITE TO SQL DB //////////
	///////////////////////////////////////////////////////

	// Only input information into database if there are no errors
	if ( !$anyErrors ) 
	{
		// Create a DateTime object based on inputted data
	//	$dateObj= DateTime::createFromFormat('Y-m-d', $expenseYear . "-" . $expenseMonth . "-" . $expenseDay);

		// Get the name of the month (e.g. January) of this expense
	//	$expenseMonthName= $dateObj->format('F');

		// Get the day of the week (e.g. Tuesday) of this expense
	//	$expenseDayOfWeekNum= $dateObj->format('w');
	//	$days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday','Thursday','Friday', 'Saturday');
	//	$expenseDayOfWeek = $days[$expenseDayOfWeekNum];

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

		echo $tsql;

		// Run query
		$sqlQueryStatus= sqlsrv_query($conn, $tsql);

		// Close SQL database connection
		sqlsrv_close ($conn);
	}

	// Initialize an array of previously-posted info
//	$prevSelections = array();

	// Populate array with key-value pairs
//	$prevSelections['errorMessage']= $errorMessage;
//	$prevSelections['prevExpenseDay']= $expenseDay;
//	$prevSelections['prevExpenseMonth']= $expenseMonth;
//	$prevSelections['prevExpenseYear']= $expenseYear;
//	$prevSelections['prevExpenseCategory']= $expenseCategory;
//	$prevSelections['prevExpenseAmount']= $expenseAmount;
//	$prevSelections['prevExpenseNote']= $expenseNote;

	// Store previously-selected data as part of info to carry over after URL redirection
//	$_SESSION['prevSelections'] = $prevSelections;

	/* Redirect browser to home page */
	// header("Location: /"); 
?>