<!DOCTYPE html>

<html>
	
	<head>

		<title>FitFueler - Add to Consumption</title>

		<link href="styles.css" rel="stylesheet">

	</head>

	<body>

		<div class="logo"><a href="index.php"><input type="submit" value="Home"></a></div>

		<?php

			$id = $_POST["id"];

			$conn = new mysqli("localhost", "root", "", "fitfueler");

			if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT * from food_data WHERE id = $id";
			$result = $conn->query($sql);
			$data = $result->fetch_assoc();

			$name = $data["name"];
			$unit = $data["unit"];
			$calories = $data["calories"];
			$protein = $data["protein"];
			$carbs = $data["carbs"];
			$fat = $data["fat"];
			$unit_size = $data["unit_size"];
			$unit_name = $data["unit_name"];

			include "fetchTrackers.php";

		?>

		<h1 class="add-to-consumption-heading">Add to Consumption</h1>

		<div class="unit-info-container">

			<h2><?php echo $name?></h2>
			<h3><?php echo "Unit Size: 1 " . $unit_name . " (" . $unit_size . " " . $unit . ")" ?></h3>

		</div>

		<div class="nutritional-info-container">

			<h2>Nutritional Information</h2>
			
			<table>

				<tr>

					<td>

						<h3>Calories</h3>

						<div class="nutritional-info-display-block">
							<p><?php echo $calories . " kcal / 100 " . $unit ?></p>
							<p><?php echo round($calories / $calories_goal * 100, 0) . "% of intake goal"?></p>
						</div>

						<div class="nutritional-info-display-block">
							<p><?php echo round($calories * $unit_size / 100, 0) . " kcal / unit"?></p>
							<p><?php echo round($calories * $unit_size / $calories_goal, 0) . "% of intake goal"?></p>
						</div>

					</td>

					<td>

						<h3>Protein</h3>

						<div class="nutritional-info-display-block">
							<p><?php echo $protein . " g / 100 " . $unit ?></p>
							<p><?php echo round($protein / $protein_goal * 100, 0) . "% of intake goal"?></p>
						</div>

						<div class="nutritional-info-display-block">
							<p><?php echo round($protein * $unit_size / 100, 0) . " g / unit"?></p>
							<p><?php echo round($protein * $unit_size / $protein_goal, 0) . "% of intake goal"?></p>
						</div>

					</td>

					<td>

						<h3>Carbs</h3>
						
						<div class="nutritional-info-display-block">
							<p><?php echo $carbs . " g / 100 " . $unit ?></p>
							<p><?php echo round($carbs / $carbs_goal * 100, 0) . "% of intake goal"?></p>
						</div>

						<div class="nutritional-info-display-block">
							<p><?php echo round($carbs * $unit_size / 100, 0) . " g / unit"?></p>
							<p><?php echo round($carbs * $unit_size / $carbs_goal, 0) . "% of intake goal"?></p>
						</div>

					</td>

					<td>

						<h3>Fat</h3>
						
						<div class="nutritional-info-display-block">
							<p><?php echo $fat . " g / 100 " . $unit ?></p>
							<p><?php echo round($fat / $fat_goal * 100, 0) . "% of intake goal"?></p>
						</div>

						<div class="nutritional-info-display-block">
							<p><?php echo round($fat * $unit_size / 100, 0) . " g / unit"?></p>
							<p><?php echo round($fat * $unit_size / $fat_goal, 0) . "% of intake goal"?></p>
						</div>

					</td>

				</tr>

			</table>

		</div>

		<div class="add-to-consumption-container">

			<tr>

				<th>Add by Mass</th>

				<th>Add by Unit</th>

			</tr>

			<tr>

				<td>

					<form action="addByMass.php" method="post">

						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="text" name="quantity"> <?php echo $unit; ?>
						
						<select name="meal">

							<option value="breakfast">Breakfast</option>
							<option value="lunch">Lunch</option>
							<option value="dinner">Dinner</option>
							<option value="snacks">Snacks</option>

						</select>

						<input type="submit" value="Add">

					</form>

				</td>

				<td>

					<form action="addByUnit.php" method="post">

						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="text" name="quantity"> units
						
						<select name="meal">

							<option value="breakfast">Breakfast</option>
							<option value="lunch">Lunch</option>
							<option value="dinner">Dinner</option>
							<option value="snacks">Snacks</option>

						</select>

						<input type="submit" value="Add">

					</form>

				</td>

			</tr>

		</div>

	</body>

</html>