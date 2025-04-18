<!DOCTYPE html>

<html>

	<head>

		<title>FitFueler - Change Goals</title>

		<link href="styles.css" rel="stylesheet">

	</head>

	<body>

		<div class="logo"><a href="index.php"><input type="submit" value="Home"></a></div>

		<?php
			include "fetchTrackers.php";
		?>

		<h1 class="change-goals-heading">Change Goals</h1>

		<div class="change-goals-container">

			<h2>Current Goals</h2>

			<table>

				<tr>

					<td>

						<h3>Calories</h3>
						<p><?php echo $calories_goal . " kcal" ?></div>

					</td>

					<td>

						<h3>Protein</h3>
						<p><?php echo $protein_goal . " g" ?></div>

					</td>

					<td>

						<h3>Carbs</h3>
						<p><?php echo $carbs_goal . " g" ?></div>

					</td>

					<td>

						<h3>Fat</h3>
						<p><?php echo $fat_goal . " g" ?></div>

					</td>

				</tr>

			</table>

		</div>

		<form action="updateGoals.php" method="post">

			<div class="change-goals-container">

				<h2>Update Goals</h2>

				<table>

					<tr>

						<td>

							<h3>Calories</h3>
							<p><input type="text" name="calories_goal_new"> kcal</p>

						</td>

						<td>

							<h3>Protein</h3>
							<p><input type="text" name="protein_goal_new"> g</p>

						</td>

						<td>

							<h3>Carbs</h3>
							<p><input type="text" name="carbs_goal_new"> g</p>

						</td>

						<td>

							<h3>Fat</h3>
							<p><input type="text" name="fat_goal_new"> g</p>

						</td>

					</tr>

				</table>

			</div>

			<br>

			<div class="update-goals"><input type="submit" value="Update"></div>

		</form>

	</body>

</html>