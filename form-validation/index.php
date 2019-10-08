<?php
if (isset($_POST['mysubmit'])) {
	$user = trim($_POST['user']);
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	$address = trim($_POST['address']);
	$city = trim($_POST['city']);
	$province = trim($_POST['province']);
	$country = trim($_POST['country']);
	$gender = trim($_POST['gender']);
	$subscribe = trim($_POST['subscribe']);
	$comments = trim($_POST['comments']);
	$url = trim($_POST['url']);

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

	// check user validation
	if ((strlen($password) < 3) || (strlen($password) > 20)) {
		$valid = 0;
		// specific message
		$valPasswordMsg = "Please enter a password between 3 and 20 characters";
	}

	// province validation
	if ($country == "") {
		$valid = 0;
		$valCountryMsg = "Please select a country.";
	}

	// URL validation
	if (!filter_var($url, FILTER_VALIDATE_URL)) {
		$valid = 0;
		$valUrlMsg = "You must enter a valid URL like \"https://website.com\".";
	}


	// success. if our boolean is still 1 then user form data is good.
	if ($valid == 1) {
		$msgSuccess = "SUCCESS!<br />The form data is correct";
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
		body {
			height: 100vh;
			background: grey;
		}

		.container {
			margin-top: 3rem;
		}

		.formstyle {
			/* optional: in case you don't like the really wide form */
			margin: 0 auto;
			padding: 0;
			background: #ADEFD1FF;
			color: #00203FFF;
			padding: 0 2rem 2rem;
			max-width: 650px;
		}

		form label.required::before {
			color: red;
			content: "* ";
			margin-left: -11px;
		}

		.header-div {
			width: 100%;
			color: #00203FFF;
		}
	</style>
</head>

<body>
	<div class="container">

		<form name="myform" class="formstyle row" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<div class="row">
				<div class="header-div">
					<h1>PHP Form Validation</h1>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="required" for="user">Name:</label>
						<input type="text" class="form-control" name="user" value="<?php if ($user) {
																						echo $user;
																					} ?>">
						<?php if ($valUserMsg) {
							echo $msgPreError . $valUserMsg . $msgPost;
						} ?>
					</div>
					<div class="form-group">
						<label class="required" for="email">Email:</label>
						<input type="text" class="form-control" name="email" value="<?php if ($email) {
																						echo $email;
																					} ?>">
						<?php if ($valEmailMsg) {
							echo $msgPreError . $valEmailMsg . $msgPost;
						} ?>
					</div>
					<div class="form-group">
						<label class="required" for="password">Password:</label>
						<input type="password" class="form-control" name="password">
						<?php if ($valPasswordMsg) {
							echo $msgPreError . $valPasswordMsg . $msgPost;
						} ?>
					</div>
					<div class="form-group">
						<label for="address">Address:</label>
						<input type="address" class="form-control" name="address" value="<?php if ($address) {
																								echo $address;
																							} ?>">
					</div>
					<div class="form-group">
						<label for="city">City:</label>
						<input type="city" class="form-control" name="city" value="<?php if ($city) {
																						echo $city;
																					} ?>">
					</div>
				</div>
				<div class="col-6">
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
					</div>
					<div class="form-group">
						<label class="required" for="country">Country:</label>
						<select class="form-control" name="country">
							<option value="">Please Select A Country</option>
							<option value="Belize" <?php if (isset($country) && ($country == "Belize")) {
														echo "selected";
													} ?>>Belize</option>
							<option value="Canada" <?php if (isset($country) && ($country == "Canada")) {
														echo "selected";
													} ?>>Canada</option>
							<option value="Netherlands" <?php if (isset($country) && ($country == "Netherlands")) {
															echo "selected";
														} ?>>Netherlands</option>
							<option value="Yemen" <?php if (isset($country) && ($country == "Yemen")) {
														echo "selected";
													} ?>>Yemen</option>
						</select>
						<?php
						if ($valCountryMsg) {
							echo $msgPreError . $valCountryMsg . $msgPost;
						}
						?>
					</div>
					<div class="form-group">
						<label for="comments">Comments:</label>
						<textarea class="form-control" name="comments" col="30" row="10"><?php if ($comments) {
																								echo $comments;
																							} ?></textarea>
					</div>
					<div class="form-group">
						<label class="required" for="url">URL:</label>
						<input placeholder="http://website.com" type="text" class="form-control" name="url" value="<?php if ($url) {
																						echo $url;
																					} ?>">
						<?php
						if ($valUrlMsg) {
							echo $msgPreError . $valUrlMsg . $msgPost;
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
					<div class="form-check">
						<label class="form-check-label">
							<input name="subscribe" type="checkbox" class="form-check-input" <?php if ($subscribe) {
																									echo "checked";
																								} ?>>Subscribe to Newsletter
						</label>
					</div>



					<input type="submit" class="btn btn-primary" name="mysubmit">
					<?php if ($valid == 1) {
						echo $msgPreSuccess . $msgSuccess . $msgPost;
					} ?>
				</div>
				<?php //echo "$user, $email, $password, $address, $city, $province, $country, $comments, $url, $gender, $subscribe"
				?>
			</div>
		</form>


	</div><!-- / .container -->

</body>

</html>