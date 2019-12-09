<?php
include("includes/header.php");
?>

<div class="row container mt-3">
	<div class="col-8">
	<div class="widget-styles">
	
		<h2 class="display-title">Explore the Many Cheeses!</h2><br />
		<?php

		// HERE IS THE DEFAULT QUERY: IF NOTHING BELOW THEN THIS QUERY WILL STAND; OTHERWISE, IT WILL BE OVERWRITTEN
		$sql = "SELECT * FROM cheese_db"; // SHOW EVERYTHING

		$displayby = $_GET['displayby'];
		$displayvalue = $_GET['displayvalue'];

		if ($displayby && $displayvalue) {
			$sql = "SELECT * FROM cheese_db WHERE $displayby LIKE '$displayvalue'";
		}

		$min = $_GET['min'];
		$max = $_GET['max'];
		if ($displayby == "age" && $min && $max) {
			// $sql = "SELECT * FROM dogs WHERE...";
			$sql = "SELECT * FROM cheese_db WHERE age BETWEEN $min AND $max"; // SHOW ONLY DOGS FROM ID RANGE
		}

		if ($displayby == "price" && $min && $max) {
			// $sql = "SELECT * FROM dogs WHERE...";
			$sql = "SELECT * FROM cheese_db WHERE price BETWEEN $min AND $max"; // SHOW ONLY DOGS FROM ID RANGE
		}

		$result = mysqli_query($con, $sql); //OK. Let's run whatever query we have set above.


		if (!$result) { // THIS IS ONE WAY TO DEAL WITH A BAD QUERY SOMEHOW; WILL NOT SECURE OUR DB, BUT WILL DEGRADE GRACEFULLY FOR USER.
			echo "\n<p>Bad Query</p>\n";
			include("footer.php");
			exit();
		}
		// HANDLING NO RESULTS FROM A QUERY
		if (mysqli_num_rows($result) == 0) {
			echo "<h1>Nothing to Show</h1>";
		}
		// DISPLAY RESULTS: Only relevant results thumbnails should be displayed.
		
		while ($row = mysqli_fetch_array($result)) {
			$cheese = $row['cheese'];
			$cid = $row['cid'];
			$image_file = $row['image_file'];
			echo "\n<div class=\"thumb\">";
			echo "<a href=\"cheese.php?cid=$cid\"><img src=\"images/squares80/$image_file\" /></a><br />";
			echo "<a href=\"cheese.php?cid=$cid\">$cheese</a><br />\n";
			echo "\n</div>";
		}

		?>
</div>




		<?php
		include("includes/footer.php");
		?>