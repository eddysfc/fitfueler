<?php

	$conn = new mysqli("localhost", "root", "", "fitfueler");

	if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * from meal_selector";
	$result = $conn->query($sql);
	$data = $result->fetch_assoc();

	$breakfast_selected = $data["breakfast_selected"];
	$lunch_selected = $data["lunch_selected"];
	$dinner_selected = $data["dinner_selected"];
	$snacks_selected = $data["snacks_selected"];

	$calories_cur = $breakfast_selected * $calories_breakfast + $lunch_selected * $calories_lunch + $dinner_selected * $calories_dinner + $snacks_selected * $calories_snacks;
	$protein_cur = $breakfast_selected * $protein_breakfast + $lunch_selected * $protein_lunch + $dinner_selected * $protein_dinner + $snacks_selected * $protein_snacks;
	$carbs_cur = $breakfast_selected * $carbs_breakfast + $lunch_selected * $carbs_lunch + $dinner_selected * $carbs_dinner + $snacks_selected * $carbs_snacks;
	$fat_cur = $breakfast_selected * $fat_breakfast + $lunch_selected * $fat_lunch + $dinner_selected * $fat_dinner + $snacks_selected * $fat_snacks;

?>