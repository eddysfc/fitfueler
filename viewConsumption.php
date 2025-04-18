<!DOCTYPE html>

<html>
	
	<head>

		<title>FitFueler - View Consumption</title>

		<link href="styles.css" rel="stylesheet">

	</head>

	<body>

		<?php

			$conn = new mysqli("localhost", "root", "", "fitfueler");

			if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			include "fetchTrackers.php";
		?>

		<div class="logo"><a href="index.php"><input type="submit" value="Home"></a></div>

		<h1 class="consumption-heading">View Consumption</h1>

		<div class="consumption-container"> 

			<h2>Breakfast</h2>
			<?php 

				$sql = "SELECT * FROM consumption WHERE meal = 'breakfast'";
				$result = $conn->query($sql); 

				if($result->num_rows) {
					echo "<table><tr><th>Name</th><th>Mass</th><th>Calories</th><th>Protein</th><th>Carbs</th><th>Fat</th></tr>";

					while($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['mass'] . " " . $row['unit'] . "</td>";
						echo "<td>" . $row['calories'] . " kcal</td>";
						echo "<td>" . $row['protein'] . " g</td>";
						echo "<td>" . $row['carbs'] . " g</td>";
						echo "<td>" . $row['fat'] . " g</td>";
						echo "<td><form action='modifyConsumptionEntry.php' method='post'><input type='hidden' name='id' value=" . $row['id'] . "><input type='submit' value='Modify'></form></td>";
						echo "<td><form action='deleteConsumptionEntry.php' method='post'><input type='hidden' name='id' value=" . $row['id'] . "><input type='submit' value='Delete'></form></td>";
						echo "</tr>";

					}

					echo "</table>";

				}
				
				else {
					echo "<p>None yet. Add foods to section in the homepage.</p>";
				}

			?>

			<h2>Lunch</h2>
			<?php 

				$sql = "SELECT * FROM consumption WHERE meal = 'lunch'";
				$result = $conn->query($sql); 

				if($result->num_rows) {
					echo "<table><tr><th>Name</th><th>Mass</th><th>Calories</th><th>Protein</th><th>Carbs</th><th>Fat</th></tr>";

					while($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['mass'] . " " . $row['unit'] . "</td>";
						echo "<td>" . $row['calories'] . " kcal</td>";
						echo "<td>" . $row['protein'] . " g</td>";
						echo "<td>" . $row['carbs'] . " g</td>";
						echo "<td>" . $row['fat'] . " g</td>";
						echo "<td><form action='modifyConsumptionEntry.php' method='post'><input type='hidden' name='id' value=" . $row['id'] . "><input type='submit' value='Modify'></form></td>";
						echo "<td><form action='deleteConsumptionEntry.php' method='post'><input type='hidden' name='id' value=" . $row['id'] . "><input type='submit' value='Delete'></form></td>";
						echo "</tr>";

					}

					echo "</table>";

				}
				
				else {
					echo "<p>None yet. Add foods to section in the homepage.</p>";
				}

			?>

			<h2>Dinner</h2>
			<?php 

				$sql = "SELECT * FROM consumption WHERE meal = 'dinner'";
				$result = $conn->query($sql); 

				if($result->num_rows) {
					echo "<table><tr><th>Name</th><th>Mass</th><th>Calories</th><th>Protein</th><th>Carbs</th><th>Fat</th></tr>";

					while($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['mass'] . " " . $row['unit'] . "</td>";
						echo "<td>" . $row['calories'] . " kcal</td>";
						echo "<td>" . $row['protein'] . " g</td>";
						echo "<td>" . $row['carbs'] . " g</td>";
						echo "<td>" . $row['fat'] . " g</td>";
						echo "<td><form action='modifyConsumptionEntry.php' method='post'><input type='hidden' name='id' value=" . $row['id'] . "><input type='submit' value='Modify'></form></td>";
						echo "<td><form action='deleteConsumptionEntry.php' method='post'><input type='hidden' name='id' value=" . $row['id'] . "><input type='submit' value='Delete'></form></td>";
						echo "</tr>";

					}

					echo "</table>";

				}
				
				else {
					echo "<p>None yet. Add foods to section in the homepage.</p>";
				}

			?>
			<h2>Snacks</h2>
			<?php 

				$sql = "SELECT * FROM consumption WHERE meal = 'snacks'";
				$result = $conn->query($sql); 

				if($result->num_rows) {
					echo "<table><tr><th>Name</th><th>Mass</th><th>Calories</th><th>Protein</th><th>Carbs</th><th>Fat</th></tr>";

					while($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['mass'] . " " . $row['unit'] . "</td>";
						echo "<td>" . $row['calories'] . " kcal</td>";
						echo "<td>" . $row['protein'] . " g</td>";
						echo "<td>" . $row['carbs'] . " g</td>";
						echo "<td>" . $row['fat'] . " g</td>";
						echo "<td><form action='modifyConsumptionEntry.php' method='post'><input type='hidden' name='id' value=" . $row['id'] . "><input type='submit' value='Modify'></form></td>";
						echo "<td><form action='deleteConsumptionEntry.php' method='post'><input type='hidden' name='id' value=" . $row['id'] . "><input type='submit' value='Delete'></form></td>";
						echo "</tr>";

					}

					echo "</table>";

				}
				
				else {
					echo "<p>None yet. Add foods to section in the homepage.</p>";
				}

			?>

		</div>

	</body>

</html>