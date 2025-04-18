<?php
	
	// Grab user input from POST function
	$calories_goal_new = $_POST["calories_goal_new"];
	$protein_goal_new = $_POST["protein_goal_new"];
	$carbs_goal_new = $_POST["carbs_goal_new"];
	$fat_goal_new = $_POST["fat_goal_new"];

    function checkFloat($val) {
        try {
            if(!is_float($val)) { // Check if input is a float, if not, return an error message
                throw new Exception("Error: Field must be a non-zero integer or float."); 
            }
            return $val; // If no error detected, return the value directly
        }
        catch(Exception $e) {
            return $e -> getMessage(); // Return error message
        }
    }
    
    // Exception handling for all user inputs
    $calories_goal_new = checkFloat($calories_goal_new);
    $protein_goal_new = checkFloat($protein_goal_new);
    $carbs_goal_new = checkFloat($carbs_goal_new);
    $fat_goal_new = checkFloat($fat_goal_new);

	// Establish and verify database connection
	$conn = new mysqli("localhost", "root", "", "fitfueler");

	if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Construct MySQL query to update database fields containing the user's current intake goals to be the newly set ones
	$sql = "UPDATE intake_tracker SET calories_goal = $calories_goal_new, protein_goal = $protein_goal_new, carbs_goal = $carbs_goal_new, fat_goal = $fat_goal_new";
	
	// Execute and error-check query
	if(!$conn->query($sql)) {
		// Display error message if error detected
		echo "Error updating fields: " . $conn->error;
	}
	else {
		// Display success message and redirect user back to homepage
		die("Successfully updated! Returning in 3 seconds... <script> setTimeout(function() { window.location.href = 'index.php'; }, 3000); </script>");
	}

?>