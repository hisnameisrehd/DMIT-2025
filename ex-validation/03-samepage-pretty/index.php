<?php
if (isset($_POST['mysubmit'])) {
	$user = trim($_POST['user']);
	$email = trim($_POST['email']);
	$province = trim($_POST['province']);
	$gender = trim($_POST['gender']);
	$subscribe = trim($_POST['subscribe']);
	$comments = trim($_POST['comments']);

	// echo "$user, $email, $province, $gender, $subscribe, $comments";
	$valid = 1;
	$msgPreError = "<div class=\"alert alert-danger\" role=\"alert\">";
	$msgPreSuccess = "<div class=\"alert alert-primary\" role=\"alert\">";
	$msgPost = "</div>";

	// check user validation
	if ((strlen($user) < 3) || (strlen($user) > 20)) {
		$valid = 0;
		// specific message
		$valUserMsg = "Please enter a name between 3 and 20 characters";
	}

	// check email validation
	if ($email != "") {
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // validates correct email format
			$valid = 0;
			$valEmailMsg = "\nPlease fill in a correct email address.";
		}
	} else {
		$valid = 0;
		$valEmailMsg = "\nPlease fill in an email address.";
	}

	// province validation
	if ($province == "") {
		$valid = 0;
		$valProvMsg = "Please select a province.";
	}

	// gender validation
	if ($gender == "") {
		$valid = 0;
		$valGenderMsg = "Please select a gender.";
	}

	// sub validation
	if ($subscribe == "") {
		$valid = 0;
		$valSubMsg = "You must subscribe.";
	}




	// success. if our boolean is still 1 then user form data is good.
	if ($valid == 1) {
		$msgSuccess = "SUCCESS. Form data is correct";
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>PHP Form Validation</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.formstyle {
			/* optional: in case you don't like the really wide form */
			max-width: 550px;
		}
	</style>
</head>

<body>
	<div class="container">

		<h1>PHP Form Validation</h1>
		<form name="myform" class="formstyle" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">


			<div class="form-group">
				<label for="user">Name:</label>
				<input type="text" class="form-control" name="user" value="<?php if ($user) {
																				echo $user;
																			} ?>">
				<?php if ($valUserMsg) {
					echo $msgPreError . $valUserMsg . $msgPost;
				} ?>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="text" class="form-control" name="email" value="<?php if ($email) {
																				echo $email;
																			} ?>">
				<?php if ($valEmailMsg) {
					echo $msgPreError . $valEmailMsg . $msgPost;
				} ?>
			</div>
			<div class="form-group">
				<label for="province">Province:</label>
				<select class="form-control" name="province">
					<option value="">Please Select A Province</option>
					<option value="AB" <?php if (isset($province) && ($province == "AB")) {
											echo "selected";
										} ?>>Alberta</option>
					<option value="BC" <?php if (isset($province) && ($province == "BC")) {
											echo "selected";
										} ?>>British Columbia</option>
					<option value="MB" <?php if (isset($province) && ($province == "MB")) {
											echo "selected";
										} ?>>Manitoba</option>
					<option value="NB" <?php if (isset($province) && ($province == "NB")) {
											echo "selected";
										} ?>>New Brunswick</option>
					<option value="NL" <?php if (isset($province) && ($province == "NL")) {
											echo "selected";
										} ?>>Newfoundland and Labrador</option>
					<option value="NS" <?php if (isset($province) && ($province == "NS")) {
											echo "selected";
										} ?>>Nova Scotia</option>
					<option value="ON" <?php if (isset($province) && ($province == "ON")) {
											echo "selected";
										} ?>>Ontario</option>
					<option value="PE" <?php if (isset($province) && ($province == "PE")) {
											echo "selected";
										} ?>>Prince Edward Island</option>
					<option value="QC" <?php if (isset($province) && ($province == "QC")) {
											echo "selected";
										} ?>>Quebec</option>
					<option value="SK" <?php if (isset($province) && ($province == "SK")) {
											echo "selected";
										} ?>>Saskatchewan</option>
					<option value="NT" <?php if (isset($province) && ($province == "NT")) {
											echo "selected";
										} ?>>Northwest Territories</option>
					<option value="NU" <?php if (isset($province) && ($province == "NU")) {
											echo "selected";
										} ?>>Nunavut</option>
					<option value="YT" <?php if (isset($province) && ($province == "YT")) {
											echo "selected";
										} ?>>Yukon</option>
				</select>
				<?php
				if ($valProvMsg) {
					echo $msgPreError . $valProvMsg . $msgPost;
				}
				?>
			</div>
			<div class="form-check">
				<label class="form-check-label">
					<input name="gender" type="radio" class="form-check-input" value="male" <?php if (isset($gender) && ($gender == "male")) {
																								echo "checked";
																							} ?>>Male
				</label>

			</div>
			<div class="form-check">
				<label class="form-check-label">
					<input name="gender" type="radio" class="form-check-input" value="female" <?php if (isset($gender) && ($gender == "female")) {
																									echo "checked";
																								} ?>>Female
				</label>
			</div>
			<?php
			if ($valGenderMsg) {
				echo $msgPreError . $valGenderMsg . $msgPost;
			}
			?>
			<div class="form-check">
				<label class="form-check-label">
					<input name="subscribe" type="checkbox" class="form-check-input" <?php if ($subscribe) {
																							echo "checked";
																						} ?>>Subscribe to Newsletter
				</label>
			</div>
			<?php
			if ($valSubMsg) {
				echo $msgPreError . $valSubMsg . $msgPost;
			}
			?>
			<div class="form-group">
				<label for="comments">Comments:</label>
				<textarea class="form-control" name="comments" col="30" row="10"><?php if ($comments) {
																						echo $comments;
																					} ?></textarea>
			</div>

			<input type="submit" class="btn btn-primary" name="mysubmit">
			<?php if ($valid == 1) {
				echo $msgPreSuccess . $msgSuccess . $msgPost;
			} ?>

		</form>


	</div><!-- / .container -->

</body>

</html>