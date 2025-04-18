<?php

	$conn = new mysqli("localhost", "root", "", "fitfueler");

	if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "UPDATE meal_selector SET snacks_selected = 1 - snacks_selected";
	
	if(!$conn->query($sql)) {
		echo "Error updating field: " . $conn->error;
	}

	include "fetchTrackers.php";
	include "updateTrackers.php";

	$return_array = array($calories_cur, $protein_cur, $carbs_cur, $fat_cur, $calories_goal, $protein_goal, $carbs_goal, $fat_goal);
	$json = json_encode($return_array);

	echo $json;

?>