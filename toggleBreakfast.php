<?php
	
	// Establish and verify database connection
	$conn = new mysqli("localhost", "root", "", "fitfueler");

	if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Construct MySQL query to toggle whether breakfast intake is included in the intake trackers
	$sql = "UPDATE meal_selector SET breakfast_selected = 1 - breakfast_selected";
	
	// Execute and error-check the MySQL query
	if(!$conn->query($sql)) {
		echo "Error updating field: " . $conn->error;
	}

	// Include abstracted PHP files
	include "fetchTrackers.php";
	include "updateTrackers.php";

	// Construct the array containing the current and target consumption. This will be returned to the JavaScript file which updates the webpage using AJAX
	$return_array = array($calories_cur, $protein_cur, $carbs_cur, $fat_cur, $calories_goal, $protein_goal, $carbs_goal, $fat_goal);
	
	// Encoding the array using JSON
	$json = json_encode($return_array);

	// Send the JSON object
	echo $json;

?>