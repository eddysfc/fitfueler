<!DOCTYPE html>

<html>
	
	<head>

		<title>FitFueler - Modify Consumption Entry </title>

		<link href="styles.css" rel="stylesheet">

	</head>

	<body>

		<div class="logo"><a href="index.php"><input type="submit" value="Home"></a></div>

		<h1 class="modify-consumption-heading">Modify Consumption Entry</h1>

		<?php

			$id = $_POST["id"];

			$conn = new mysqli("localhost", "root", "", "fitfueler");

			if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT * from consumption WHERE id = $id";
			$result = $conn->query($sql);
			$data = $result->fetch_assoc();

			$mass = $data["mass"];
			$unit = $data["unit"];

		?>

		<div class="modify-consumption-container">

			<h2>Current Consumption</h2>

			<h3>Mass</h3>
			<p><?php echo $mass . " " . $unit ?></p>

			<h3>New Consumption</h3>
			<p>
				<form action='updateConsumptionEntry.php' method='post'>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="text" name="new_mass">
					<input type='submit' value='Update'>
				</form>
			</p>

		</div>

	</body>

</html>