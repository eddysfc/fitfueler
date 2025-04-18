<?php

	$id = $_POST["id"];
	$new_mass = $_POST["new_mass"];

	$conn = new mysqli("localhost", "root", "", "fitfueler");

	if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * from consumption WHERE id = $id";
	$result = $conn->query($sql);
	$data = $result->fetch_assoc();

	$mass = $data["mass"];
	$meal = $data["meal"];
	$calories = $data["calories"];
	$calories_new = round($calories / $mass * $new_mass, 0);
	$protein = $data["protein"];
	$protein_new = round($protein / $mass * $new_mass, 0);
	$carbs = $data["carbs"];
	$carbs_new = round($carbs / $mass * $new_mass, 0);
	$fat = $data["fat"];
	$fat_new = round($protein / $mass * $new_mass, 0);

	include "fetchTrackers.php";

	if($meal == "breakfast") {
		$sql = "UPDATE intake_tracker SET calories_breakfast = calories_breakfast - $calories + $calories_new, protein_breakfast = protein_breakfast - $protein + $protein_new, carbs_breakfast = carbs_breakfast - $carbs + $carbs_new, fat_breakfast = fat_breakfast - $fat + $fat_new";
	}
	elseif($meal == "lunch") {
		$sql = "UPDATE intake_tracker SET calories_lunch = calories_lunch - $calories + $calories_new, protein_lunch = protein_lunch - $protein + $protein_new, carbs_lunch = carbs_lunch - $carbs + $carbs_new, fat_lunch = fat_lunch - $fat + $fat_new";
	}
	elseif($meal == "dinner") {
		$sql = "UPDATE intake_tracker SET calories_dinner = calories_dinner - $calories + $calories_new, protein_dinner = protein_dinner - $protein + $protein_new, carbs_dinner = carbs_dinner - $carbs + $carbs_new, fat_dinner = fat_dinner - $fat + $fat_new";
	}
	else {
		$sql = "UPDATE intake_tracker SET calories_snacks = calories_snacks - $calories + $calories_new, protein_snacks = protein_snacks - $protein + $protein_new, carbs_snacks = carbs_snacks - $carbs + $carbs_new, fat_snacks = fat_snacks - $fat + $fat_new";
	}

	$conn->query($sql);

	$sql = "UPDATE consumption SET mass = $new_mass, calories = $calories_new, protein = $protein_new, carbs = $carbs_new, fat = $fat_new WHERE id = $id";

	if(!$conn->query($sql)) {
		die("Error: " . $conn->error());
	}
	else {
		die("Successfully updated consumption. Returning in 3 seconds... <script> setTimeout(function() { window.location.href = 'index.php'; }, 3000); </script>");
	}

?>