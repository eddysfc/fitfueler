<?php
	
	// Establish database connection
	$conn = new mysqli("localhost", "root", "", "fitfueler");

	// Validate database connection
	if($conn->connect_error) {
		// Close application if connection error detected
		die("Connection failed: " . $conn->connect_error);
	}

	// Construct and execute MySQL query
	$sql = "SELECT * from intake_tracker";
	$result = $conn->query($sql);
	$data = $result->fetch_assoc();

	// Define tracker variables.

	$calories_goal = $data["calories_goal"];
	$protein_goal = $data["protein_goal"];
	$carbs_goal = $data["carbs_goal"];
	$fat_goal = $data["fat_goal"];
	$calories_breakfast = $data["calories_breakfast"];
	$calories_lunch = $data["calories_lunch"];
	$calories_dinner = $data["calories_dinner"];
	$calories_snacks = $data["calories_snacks"];
	$protein_breakfast = $data["protein_breakfast"];
	$protein_lunch = $data["protein_lunch"];
	$protein_dinner = $data["protein_dinner"];
	$protein_snacks = $data["protein_snacks"];
	$carbs_breakfast = $data["carbs_breakfast"];
	$carbs_lunch = $data["carbs_lunch"];
	$carbs_dinner = $data["carbs_dinner"];
	$carbs_snacks = $data["carbs_snacks"];
	$fat_breakfast = $data["fat_breakfast"];
	$fat_lunch = $data["fat_lunch"];
	$fat_dinner = $data["fat_dinner"];
	$fat_snacks = $data["fat_snacks"];
	
	// Although arrays could have been implemented to achieve a similar effect in shorter code, these subprocesses will be abstracted regardless, so readability and redundacy with declaring them one-by-one is not a problem. Furthermore, by declaring these variables by names, it improves the understandability of the actual processes.
	
?>