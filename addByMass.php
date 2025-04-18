<?php

	$id = $_POST["id"];
	$quantity = $_POST["quantity"];
	$meal = $_POST["meal"];

	$conn = new mysqli("localhost", "root", "", "fitfueler");

	if($conn->connect_error) {
		die("Connection failed: " . $conn-> connect_error);
	}

	$sql = "SELECT * from food_data WHERE id = $id";
	$result = $conn->query($sql);
	$data = $result->fetch_assoc();

	$name = $data["name"];
	$calories = round($data["calories"] * $quantity / 100, 0);
	$protein = round($data["protein"] * $quantity / 100, 0);
	$carbs = round($data["carbs"] * $quantity / 100, 0);
	$fat = round($data["fat"] * $quantity / 100, 0);
	$unit = $data["unit"];

	$sql = "INSERT INTO consumption (name, mass, meal, calories, protein, carbs, fat, unit) VALUES ('$name','$quantity', '$meal', '$calories', '$protein', '$carbs', '$fat', '$unit')";

	$conn->query($sql);

	include "fetchTrackers.php";

	if($meal == "breakfast") {
		$sql = "UPDATE intake_tracker SET calories_breakfast = calories_breakfast + $calories, protein_breakfast = protein_breakfast + $protein, carbs_breakfast = carbs_breakfast + $carbs, fat_breakfast = fat_breakfast + $fat";
	}
	elseif($meal == "lunch") {
		$sql = "UPDATE intake_tracker SET calories_lunch = calories_lunch + $calories, protein_lunch = protein_lunch + $protein, carbs_lunch = carbs_lunch + $carbs, fat_lunch = fat_lunch + $fat";
	}
	elseif($meal == "dinner") {
		$sql = "UPDATE intake_tracker SET calories_dinner = calories_dinner + $calories, protein_dinner = protein_dinner + $protein, carbs_dinner = carbs_dinner + $carbs, fat_dinner = fat_dinner + $fat";
	}
	else {
		$sql = "UPDATE intake_tracker SET calories_snacks = calories_snacks + $calories, protein_snacks = protein_snacks + $protein, carbs_snacks = carbs_snacks + $carbs, fat_snacks = fat_snacks + $fat";
	}

	if(!$conn->query($sql)) {
		die("Error: " . $conn->error());
	}
	else {
		die("Successfully added to consumption! Returning in 3 seconds... <script> setTimeout(function() { window.location.href = 'index.php'; }, 3000); </script>");
	}
?>