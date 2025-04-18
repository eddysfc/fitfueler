<?php
	
	// Store posted search query

	$search_data = $_POST["search_data"];

	// Split query string into array by commas

	$queries = explode(",", $search_data);

	// Trim leading and trailing whitespace for each element in the queries array

	$queries = array_map("trim", $queries);

	// Define variables to store query conditions

	$name = "";
	$keywords = array();
	$allergens = array();

	// Iterate through each element in the queries array

	foreach($queries as $query) {

		// Split query by colon

		$components = explode(":", $query);

		// If the resulting array contains two elements, it is specifying a keyword or allergen. Otherwise, it is specifying a name. Add the query information to the appropriate array

		if(count($components) == 1) {
			$name = strtolower($components[0]);
		}
		elseif(strtolower($components[0]) == "keyword") {
			$keywords[] = strtolower(trim($components[1]));
		}
		elseif(strtolower($components[0]) == "allergen") {
			$allergens[] = strtolower(trim($components[1]));
		}

		// If the query is in an unrecognized format, display an output message and redirect user back to homepage

		else {
			die("Error: Unrecognized operation. Returning in 3 seconds... <script> setTimeout(function() { window.location.href = 'index.php'; }, 3000); </script>");
		}
	}

	// Establish MySQL database connection

	$conn = new mysqli("localhost", "root", "", "fitfueler");

	if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Construct SQL query

	$sql = "SELECT * FROM food_data WHERE (";

	$conditions = array();

	// Whitelist specified keywords

	foreach($keywords as $keyword) {
		$conditions[] = "keywords LIKE '%$keyword%'";
	}

	// Blacklist specified allergens

	foreach($allergens as $allergen) {
		$conditions[] = "allergens NOT LIKE '%$allergen%'";
	}

	// Whitelist specified name

	if($name) {
		$conditions[] = "name LIKE '%$name%'";
	}

	// All conditions in the conditions array must be fulfilled in the query, so AND statement used

	$sql .= implode(" AND ", $conditions) . ")";

	// Store query results

	$result = $conn->query($sql);

	// If results have been found (i.e., the number of rows returned is > 0), output a HTML table displaying each element's name, description, keywords, and allergens

	if($result->num_rows) {
		echo "<table>";
		echo "<tr><th>Name</th><th>Description</th><th>Keywords</th><th>Allergens</th></tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['description'] . "</td>";
			echo "<td>" . $row['keywords'] . "</td>";
			echo "<td>" . $row['allergens'] . "</td>";

			// Next to each field, include two buttons: one for adding the specific food to the list of consumption, another to modify the food's database information

			echo "<td><form action='addToConsumption.php' method='post'><input type='hidden' name='id' value=" . $row['id'] . "><input type='submit' value='Add to Consumption'></form></td>";
			echo "<td><form action='updateDB.php' method='post'><input type='hidden' name='id' value=" . $row['id'] . "><input type='submit' value='Modify Database Entry'></form></td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	// if no results have been found, display an indication message and redirect the user back to the homepage
	else {
		die("No results found. Returning in 3 seconds... <script> setTimeout(function() { window.location.href = 'index.php'; }, 3000); </script>");
	}

	// Close database connection
	$conn->close();
?>