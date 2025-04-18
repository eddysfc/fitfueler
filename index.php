<!DOCTYPE html>

<html>

	<head>

		<title>FitFueler - Home</title>

		<link href="styles.css" rel="stylesheet">

	</head>

	<body>

		<div class="logo"><a href="index.php"><input type="submit" value="Home"></a></div>

		<?php
			// Include abstracted processes for fetching tracker data and updating the homepage display
			include "fetchTrackers.php";
			include "updateTrackers.php"
		?>

		<div class="tracker-container">

			<table>

				<tr>

					<td>

						<h1>Calories</h1>
						<p id="calories-tracker-display"><?php echo $calories_cur . " / " . $calories_goal . " kcal" ?></p>
					
					</td>

					<td>

						<h1>Protein</h1>
						<p id="protein-tracker-display"><?php echo $protein_cur . " / " . $protein_goal . " g" ?></p>
					
					</td>

					<td>

						<h1>Carbs</h1>
						<p id="carbs-tracker-display"><?php echo $carbs_cur . " / " . $carbs_goal . " g" ?></p>
					
					</td>

					<td>

						<h1>Fat</h1>
						<p id="fat-tracker-display"><?php echo $fat_cur . " / " . $fat_goal . " g" ?></p>
					
					</td>

				</tr>

			</table>

		</div>

		<div class="meal-selector-container">

			<script src="selectMeals.js"></script>

			<table>

				<tr>
					<td><button onclick="toggleBreakfast()">Breakfast</button></td>

					<td><button onclick="toggleLunch()">Lunch</button></td>

					<td><button onclick="toggleDinner()">Dinner</button></td>

					<td><button onclick="toggleSnacks()">Snacks</button></td>
				</tr>

			</table>

		</div>

		<div class="change-goals-button-container">

			<a href="changeGoals.php"><input type="submit" value="Change"></a>

		</div>

		<div class="search-container">

			<h1>Search Foods</h1>
			<form action="searchFood.php" method="post">

				<input type="text" id="search-bar" name="search_data">
				<br>
				<input type="submit" id="submit-search" value="Submit">

			</form>

		</div>

		<div class="view-consumption-button-container">

			<a href="viewConsumption.php"><input type="submit" value="View"></a>

		</div>

	</body>

</html>