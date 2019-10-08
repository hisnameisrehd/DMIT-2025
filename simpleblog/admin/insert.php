<?php
include("../includes/header.php");

session_start();
if (isset($_SESSION['PHP_Test_Secure'])) {
	// echo "Logged In.";
} else {
	//when using redirect, make sure that everything else works first. If not, remove redirect to debug.
	// echo "Not Logged In.";
	header("Location:login.php");
}

// grab the form values and echo to test

$title = $_POST['title'];
$message = $_POST['message'];
$timedate = date('l, g:i a');
$currentDayOfMonth = date('d'); // day (01-31)
$currentMonth = date('M'); // 3 letter JUL / SEP / OCT ...
$currentYear = date('Y'); // Year 2018 / 2019 ...
// echo "$title, $message, $timedate";

if (isset($_POST['mysubmit'])) {
	// echo "submitted";
	$handle = fopen("blogfile.txt", "r"); // open text file for editing

	// Read the current text and store it in a variable 'existing'
	if ($handle) {
		while (!feof($handle)) {
			$buffer = fgets($handle, 4096);
			$existingText .= $buffer;
		} // \loop
		// echo $existingText; //testing
		fclose($handle);
	}

	// Write the new post to the blogfile.txt
	$handle = fopen("blogfile.txt", "w"); // open text file for editing

	fwrite(
		$handle,
		"<div class=\"row-container justify-content-center\">" .
			"<div>\n" .
				"<svg\n
                aria-hidden=\"true\"\n
                focusable=\"false\"\n
                data-prefix=\"fas\"\n
                data-icon=\"user-secret\"\n
                class=\"svg-inline--fa fa-user-secret fa-w-14\"\n
                role=\"img\"\n
                xmlns=\"http://www.w3.org/2000/svg\"\n
                viewBox=\"0 0 448 512\"\n
            	>\n
                <path\n
                  fill=\"currentColor\"\n
                  d=\"M383.9 308.3l23.9-62.6c4-10.5-3.7-21.7-15-21.7h-58.5c11-18.9 17.8-40.6 17.8-64v-.3c39.2-7.8 64-19.1 64-31.7 0-13.3-27.3-25.1-70.1-33-9.2-32.8-27-65.8-40.6-82.8-9.5-11.9-25.9-15.6-39.5-8.8l-27.6 13.8c-9 4.5-19.6 4.5-28.6 0L182.1 3.4c-13.6-6.8-30-3.1-39.5 8.8-13.5 17-31.4 50-40.6 82.8-42.7 7.9-70 19.7-70 33 0 12.6 24.8 23.9 64 31.7v.3c0 23.4 6.8 45.1 17.8 64H56.3c-11.5 0-19.2 11.7-14.7 22.3l25.8 60.2C27.3 329.8 0 372.7 0 422.4v44.8C0 491.9 20.1 512 44.8 512h358.4c24.7 0 44.8-20.1 44.8-44.8v-44.8c0-48.4-25.8-90.4-64.1-114.1zM176 480l-41.6-192 49.6 32 24 40-32 120zm96 0l-32-120 24-40 49.6-32L272 480zm41.7-298.5c-3.9 11.9-7 24.6-16.5 33.4-10.1 9.3-48 22.4-64-25-2.8-8.4-15.4-8.4-18.3 0-17 50.2-56 32.4-64 25-9.5-8.8-12.7-21.5-16.5-33.4-.8-2.5-6.3-5.7-6.3-5.8v-10.8c28.3 3.6 61 5.8 96 5.8s67.7-2.1 96-5.8v10.8c-.1.1-5.6 3.2-6.4 5.8z\"\n
                ></path>\n
            	</svg>\n" .
			"</div>\n" .// \svg div
			"<div>\n" .
				"<div class=\"container-bubble\">" .
					"<div class=\"arrow\">\n" .
						"<div class=\"outer\"></div>\n" .
						"<div class=\"inner\"></div>\n" .
					"</div>\n" .// \arrow
					"<div class=\"message-body\">\n" .
						"<strong class=\"message-title\">$title</strong>\n" .
						"<p>\n
						   $message<br />\n
						   </p>\n
						   <div>\n
                   				<span class=\"timedate\">$timedate</span>\n
						   </div>\n" .
					"</div>\n" .// \message-body
				"</div>\n" .// \container-bubble
			"</div>\n" .// \message div
			"<div class=\"date-div\">" .
			"<div class=\"example-date\">" .
  				"<span class=\"day\">$currentDayOfMonth</span>" .
  				"<span class=\"month\">$currentMonth</span>" .
  				"<span class=\"year\">$currentYear</span>" .
			"</div>" .
			"</div>" .
		"</div>\n"	// \row-container
	);
	fclose($handle);


	// Append the $existingText to the blogfile.txt
	// This will allow the new blog to be at the top of the file.
	$handle = fopen("blogfile.txt", "a"); // open text file for editing

	fwrite($handle, "\n\n$existingText");
	fclose($handle);
}


?>
<div class="jumbotron clearfix" style="text-align: center;background: #492b2b; color: rgb(255, 223, 223);">
	<h1 style="font-size:3.5rem;">~<?php echo APP_NAME ?>~</h1><span style="font-size: 2rem; float:right; ">Insert A New Post.</span>
</div>
<div class="d-block">
	<div class="row-container justify-content-center">

		<form style="width:65vw;" id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<div class="form-group">
				<label for="title">Title:</label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label for="message">Message:</label>
				<textarea name="message" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label for="mysubmit">&nbsp;</label>
				<input type="submit" name="mysubmit" class="btn btn-info" value="Submit">
			</div>
		</form>

	</div>
</div>
<?php
include("../includes/footer.php");
?>