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
	// DECLARE VARIABLES
	$valid = 1;
	$msgPreError = "<div class=\"alert alert-danger\" role=\"alert\">";
	$msgPreSuccess = "<div class=\"alert alert-success\" role=\"alert\">";
	$msgPost = "</div>";
	$busName = trim($_POST['busname']);
	$contactName = trim($_POST['contactname']);
	$email = trim($_POST['email']);
	$webURL = trim($_POST['website']);
	$phone = trim($_POST['phone']);
	$address = trim($_POST['address']);
	$city = trim($_POST['city']);
	$province = trim($_POST['province']);
	$postal = trim($_POST['postal']);
	$description = trim($_POST['description']);
	$resume = trim($_POST['resume']);
	/*
		Tesing the variables 
		- drag the echo out of comment field to test
		echo "$busName, $contactName, $email, $webURL, $phone, $address, $city, $province, $description, $resume";
		echo "valid = $valid";
	*/

	// FUNCTIONS
	function phoneVal($num)
	{
		// example numbers:
		// 423-4677
		// 780-456-6658
		// 7804563352
		// (780) 456-7745
		// 780.554.2153
		$num = str_replace(" ", "", $num);
		$num = str_replace("-", "", $num);
		$num = str_replace(".", "", $num);
		$num = str_replace("(", "", $num);
		$num = str_replace(")", "", $num);
		if (!is_numeric($num)) {
			return "That is not a number.";
		} else {
			return $num;
		}
	}

	// VALIDATION
	// Business name
	if ((strlen($busName) < 3) || (strlen($busName) > 20)) {
		$valid = 0;
		$valBusNameMsg = "Please enter a business name between 3 and 20 characters.";
	}
	// Contact name
	/*
	if ((strlen($contactName) < 3) || (strlen($contactName) > 20)) {
		$valid = 0;
		$valContactNameMsg = "Please enter a contact name between 3 and 20 characters.";
	}
	*/
	// Email
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
	// Website URL
	if (!filter_var($webURL, FILTER_VALIDATE_URL)) {
		$valid = 0;
		$valURLMsg = "You enter a valid URL like \"https://www.w3schools.com\".";
	}
	// Phone number
	$phoneNotValid = phoneVal($phone);
	if ($phoneNotValid) {
		if (strlen(phoneVal($phone)) != 10) {
			$valid = 0;
			$valPhoneMsg = "Please enter a 10 digit number.";
		}
	}
	// Address
	/*
	if ($address == "") {
		$valid = 0;
		$valAddressMsg = "Please enter an address.";
	}
	*/
	// City
	/*
	if ($city == "") {
		$valid = 0;
		$valCityMsg = "Please enter a city name.";
	}
	*/
	// Province validation
	/*
	if ($province == "") {
		$valid = 0;
		$valProvinceMsg = "Please select a province.";
	}
	*/
	// Postal code
	/*
	if ((strlen($postal) < 5) || (strlen($postal) > 7)) {
		$valid = 0;
		$valPostalMsg = "Please enter a postal/zip code between 5 and 7 .";
	}
	*/
	// Description
	/*
	if ((strlen($description) < 20) || (strlen($description) > 512)) {
		$valid = 0;
		$valDescMsg = "Please enter a description between 20 and 512 characters.";
	}
	*/

	// SUCCESS. 
	// If our boolean is still 1 then user form data is good.
	if ($valid == 1) {
		$msgSuccess = "Success! The form data has been stored.";
		mysqli_query(
			$con,
			"INSERT INTO npe_contacts(
				npe_business_name, 
				npe_person_name, 
				npe_email,
				npe_url,
				npe_phone,
				npe_address1,
				npe_postal,
				npe_city,
				npe_province,
				npe_description,
				npe_resume) 
			VALUES('$busName', 
				'$contactName', 
				'$email', 
				'$webURL', 
				'$phone', 
				'$address', 
				'$postal', 
				'$city', 
				'$province', 
				'$description', 
				'$resume')"
		) or die(mysqli_error($con));
		// RESET
		$busName = "";
		$contactName = "";
		$email = "";
		$webURL = "";
		$phone = "";
		$address = "";
		$city = "";
		$province = "";
		$postal = "";
		$description = "";
		$resume = "";
	}
}
?>

<div class="jumbotron clearfix">
    <h1>Insert</h1>
</div>

<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<?php if ($valid == 1) {
		echo $msgPreSuccess . $msgSuccess . $msgPost;
	} ?>
	<div class="form-group">
		<label class="required" for="busname">Business Name:</label>
		<input type="text" name="busname" class="form-control" value="<?php if ($busName) {
																			echo $busName;
																		} ?>">
		<?php if ($valBusNameMsg) {
			echo $msgPreError . $valBusNameMsg . $msgPost;
		} ?>
	</div>
	<div class="form-group">
		<label for="contactname">Contact Name:</label>
		<input type="text" name="contactname" class="form-control" value="<?php if ($contactName) {
																				echo $contactName;
																			} ?>">
		<?php if ($valContactNameMsg) {
			echo $msgPreError . $valContactNameMsg . $msgPost;
		} ?>
	</div>
	<div class="form-group">
		<label class="required" for="email">Email:</label>
		<input type="text" name="email" class="form-control" value="<?php if ($email) {
																		echo $email;
																	} ?>">
		<?php if ($valEmailMsg) {
			echo $msgPreError . $valEmailMsg . $msgPost;
		} ?>
	</div>
	<div class="form-group">
		<label class="required" for="website">Website URL:</label>
		<input type="text" name="website" class="form-control" value="<?php if ($webURL) {
																			echo $webURL;
																		} ?>">
		<?php if ($valURLMsg) {
			echo $msgPreError . $valURLMsg . $msgPost;
		} ?>
	</div>
	<div class="form-group">
		<label class="required" for="phone">Phone Number:</label>
		<input type="text" name="phone" class="form-control" value="<?php if ($phone) {
																		echo $phone;
																	} ?>">
		<?php if ($valPhoneMsg) {
			echo $msgPreError . $valPhoneMsg . $msgPost;
		} ?>
	</div>
	<div class="form-group">
		<label for="address">Address:</label>
		<input type="text" name="address" class="form-control" value="<?php if ($address) {
																			echo $address;
																		} ?>">
		<?php if ($valAddressMsg) {
			echo $msgPreError . $valAddressMsg . $msgPost;
		} ?>
	</div>
	<div class="form-group">
		<label for="city">City:</label>
		<input type="text" name="city" class="form-control" value="<?php if ($city) {
																		echo $city;
																	} ?>">
		<?php if ($valCityMsg) {
			echo $msgPreError . $valCityMsg . $msgPost;
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
		<?php if ($valProvinceMsg) {
			echo $msgPreError . $valProvinceMsg . $msgPost;
		} ?>
	</div>
	<div class="form-group">
		<label for="postal">Postal Code:</label>
		<input type="text" name="postal" class="form-control" value="<?php if ($postal) {
																			echo $postal;
																		} ?>">
		<?php if ($valPostalMsg) {
			echo $msgPreError . $valPostalMsg . $msgPost;
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
	<div class="form-check">
		<label class="form-check-label">
			<input name="resume" type="checkbox" class="form-check-input" value="1" <?php if ($resume) {
																						echo "checked";
																					} ?>>Send Résumé
		</label>
	</div>
	<br />
	<div class="form-group">
		<label for="submit">&nbsp;</label>
		<input type="submit" name="submit" class="btn btn-info" value="Submit">
	</div>
</form>

<?php
include("../includes/footer.php");
?>