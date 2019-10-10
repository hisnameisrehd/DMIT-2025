<?php
session_start();
if (isset($_SESSION['PHP_Test_Secure'])) {
	// echo "Logged In.";
} else {
	//when using redirect, make sure that everything else works first. If not, remove redirect to debug.
	// echo "Not Logged In.";
	header("Location:login.php");
}
include("../includes/header.php");




if (isset($_POST['submit'])) {
	$fname = trim($_POST['fname']);
	$lname = trim($_POST['lname']);
	$description = trim($_POST['description']);
	// echo "$fname, $lname, $description"; // this is for testing

	$valid = 1;
	$msgPreError = "<div class=\"alert alert-danger\" role=\"alert\">";
	$msgPreSuccess = "<div class=\"alert alert-success\" role=\"alert\">";
	$msgPost = "</div>";

	if ((strlen($fname) < 3) || (strlen($fname) > 20)) {
		$valid = 0;
		// specific message
		$valFNameMsg = "Please enter a first name between 3 and 20 characters.";
	}

	if ((strlen($lname) < 3) || (strlen($lname) > 20)) {
		$valid = 0;
		// specific message
		$valLNameMsg = "Please enter a last name between 3 and 20 characters.";
	}

	if ((strlen($description) < 20) || (strlen($description) > 400)) {
		$valid = 0;
		// specific message
		$valDescMsg = "Please enter a description between 20 and 400 characters.";
	}



	// success. if our boolean is still 1 then user form data is good.
	if ($valid == 1) {
		$msgSuccess = "SUCCESS. Form data has been stored.";


		mysqli_query(
			$con,
			"INSERT INTO characters(first_name, last_name, description) 
			VALUES('$fname', '$lname', '$description')"
		) or die(mysqli_error($con));

		// clean up my variables
		$fname = "";
		$lname = "";
		$description = "";
	}
}
?>
<style>
	@font-face {
		font-family: 'turtle';
		src: url(../fonts/Turtles.otf),
			url(../fonts/Turtles.woff);
	}

	h1,
	h2,
	h3,
	h4,
	h5 {
		font-size: 5rem;
		font-family: 'turtle';
	}
</style>
<h2>Insert</h2>
<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<?php if ($valid == 1) {
		echo $msgPreSuccess . $msgSuccess . $msgPost;
	} ?>
	<div class="form-group">
		<label for="fname">First Name:</label>
		<input type="text" name="fname" class="form-control" value="<?php if ($fname) {
																		echo $fname;
																	} ?>">
		<?php if ($valFNameMsg) {
			echo $msgPreError . $valFNameMsg . $msgPost;
		} ?>
	</div>
	<div class="form-group">
		<label for="lname">Last Name:</label>
		<input type="text" name="lname" class="form-control" value="<?php if ($lname) {
																		echo $lname;
																	} ?>">
		<?php if ($valLNameMsg) {
			echo $msgPreError . $valLNameMsg . $msgPost;
		} ?>
	</div>
	<div class="form-group">
		<label for="description">Description:</label>
		<textarea name="description" class="form-control"><?php if ($description) {
																echo $description;
															} ?></textarea>
		<?php if ($valDescMsg) {
			echo $msgPreError . $valDescMsg . $msgPost;
		} ?>
	</div>
	<div class="form-group">
		<label for="submit">&nbsp;</label>
		<input type="submit" name="submit" class="btn btn-info" value="Submit">
	</div>
</form>
<?php
include("../includes/footer.php");
?>