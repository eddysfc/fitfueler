<!DOCTYPE html>

<html>

	<head>


	</head>

	<body>

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
			$description = $data["description"];
			$unit = $data["unit"];
			$calories = $data["calories"];
			$protein = $data["protein"];
			$carbs = $data["carbs"];
			$fat = $data["fat"];
			$unit_size = $data["unit_size"];
			$unit_name = $data["unit_name"];
			$keywords = $data["keywords"];
			$allergens = $data["allergens"];

		?>

		<div class="update-db-container">

			<form action="changeDB.php" method="post">

				<input type="hidden" name="id" value="<?php echo $id ?>">

				<h2>Name</h2>
				<input type="text" name="name" value="<?php echo $name ?>">

				<h2>Description</h2>
				<input type="text" name="description" value="<?php echo $description ?>">

				<h2>Unit</h2>
				<input type="text" name="unit" value="<?php echo $unit ?>">

				<h2>Calories</h2>
				<input type="text" name="calories" value="<?php echo $calories ?>">

				<h2>Protein</h2>
				<input type="text" name="protein" value="<?php echo $protein ?>">

				<h2>Carbs</h2>
				<input type="text" name="carbs" value="<?php echo $carbs ?>">

				<h2>Fat</h2>
				<input type="text" name="fat" value="<?php echo $fat ?>">

				<h2>Unit Size</h2>
				<input type="text" name="unit_size" value="<?php echo $unit_size ?>">

				<h2>Unit Name</h2>
				<input type="text" name="unit_name" value="<?php echo $unit_name ?>">

				<h2>Keywords</h2>
				<input type="text" name="keywords" value="<?php echo $keywords ?>">

				<h2>Allergens</h2>
				<input type="text" name="allergens" value="<?php echo $allergens ?>">

				<br><br>

				<input type="submit" value="Update">

			</form>

		</div>

	</body>
</html>