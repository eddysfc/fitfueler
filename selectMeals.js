function toggleBreakfast() {

	// Create new AJAX request
	var xhr = new XMLHttpRequest();

	// Receive POST method data from the target file
	xhr.open("POST", "toggleBreakfast.php", true);
	xhr.onreadystatechange = function() {

		// Validate AJAX status
		if(xhr.readyState === 4 && xhr.status === 200) {

			// Receive JSON object from the PHP component
			var response = JSON.parse(this.responseText);

			// Update the webpage using elements of the received array
			document.getElementById("calories-tracker-display").innerHTML = response[0] + " / " + response[4] + " kcal";
			document.getElementById("protein-tracker-display").innerHTML = response[1] + " / " + response[5] + " g";
			document.getElementById("carbs-tracker-display").innerHTML = response[2] + " / " + response[6] + " g";
			document.getElementById("fat-tracker-display").innerHTML = response[3] + " / " + response[7] + " g";
		}

	};

	xhr.send();
};

function toggleLunch() {
	var xhr = new XMLHttpRequest();
	xhr.open("POST", "toggleLunch.php", true);
	xhr.onreadystatechange = function() {

		if(xhr.readyState === 4 && xhr.status === 200) {
			var response = JSON.parse(this.responseText);
			document.getElementById("calories-tracker-display").innerHTML = response[0] + " / " + response[4] + " kcal";
			document.getElementById("protein-tracker-display").innerHTML = response[1] + " / " + response[5] + " g";
			document.getElementById("carbs-tracker-display").innerHTML = response[2] + " / " + response[6] + " g";
			document.getElementById("fat-tracker-display").innerHTML = response[3] + " / " + response[7] + " g";
		}

	};
	xhr.send();
};

function toggleDinner() {
	var xhr = new XMLHttpRequest();
	xhr.open("POST", "toggleDinner.php", true);
	xhr.onreadystatechange = function() {

		if(xhr.readyState === 4 && xhr.status === 200) {
			var response = JSON.parse(this.responseText);
			document.getElementById("calories-tracker-display").innerHTML = response[0] + " / " + response[4] + " kcal";
			document.getElementById("protein-tracker-display").innerHTML = response[1] + " / " + response[5] + " g";
			document.getElementById("carbs-tracker-display").innerHTML = response[2] + " / " + response[6] + " g";
			document.getElementById("fat-tracker-display").innerHTML = response[3] + " / " + response[7] + " g";
		}

	};
	xhr.send();
};

function toggleSnacks() {
	var xhr = new XMLHttpRequest();
	xhr.open("POST", "toggleSnacks.php", true);
	xhr.onreadystatechange = function() {

		if(xhr.readyState === 4 && xhr.status === 200) {
			var response = JSON.parse(this.responseText);
			document.getElementById("calories-tracker-display").innerHTML = response[0] + " / " + response[4] + " kcal";
			document.getElementById("protein-tracker-display").innerHTML = response[1] + " / " + response[5] + " g";
			document.getElementById("carbs-tracker-display").innerHTML = response[2] + " / " + response[6] + " g";
			document.getElementById("fat-tracker-display").innerHTML = response[3] + " / " + response[7] + " g";
		}

	};
	xhr.send();
};