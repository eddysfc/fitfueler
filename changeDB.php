<?php
	
	// Grab variables from POST function
	$id = $_POST["id"];
	$name = $_POST["name"];
	$description = $_POST["description"];
	$unit = $_POST["unit"];
	$calories = $_POST["calories"];
	$protein = $_POST["protein"];
	$carbs = $_POST["carbs"];
	$fat = $_POST["fat"];
	$unit_size = $_POST["unit_size"];
	$unit_name = $_POST["unit_name"];
	$keywords = $_POST["keywords"];
	$allergens = $_POST["allergens"];

	// Establish and verify database connection
	$conn = new mysqli("localhost", "root", "", "fitfueler");

	if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Create prepared MySQL statement to update the database. This mitigates the risk of a SQL injection attack
	$stmt = $conn->prepare("UPDATE food_data SET name = ?, description = ?, unit = ?, calories = ?, protein = ?, carbs = ?, fat = ?, unit_size = ?, unit_name = ?, keywords = ?, allergens = ? WHERE id = $id");

	// Bind parameters to the prepared statement
	$stmt->bind_param("sssdddddsss", $name, $description, $unit, $calories, $protein, $carbs, $fat, $unit_size, $unit_name, $keywords, $allergens);

	// Execute the prepared MySQL query
	$stmt->execute();

	// Display success message (no error checking because errors would have been previously detected) and redirect user back to the homepage
	die("Database successfully updated! Returning in 3 seconds... <script> setTimeout(function() { window.location.href = 'index.php'; }, 3000); </script>");

?>