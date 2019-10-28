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
	$title = trim($_POST['title']);
	$message = trim($_POST['message']);
	// echo "$title, $message";

	// VALIDATION
	if ((strlen($title) < 3) || (strlen($title) > 20)) {
		$valid = 0;
		$valTitleMsg = "Please enter a title 3 and 20 characters.";
	}

	if ((strlen($message) < 3) || (strlen($message) > 512)) {
		$valid = 0;
		$valInputMsg = "Please enter a message between 3 and 512 characters.";
	}

	// SUCCESS. 
	// If our boolean is still 1 then user form data is good.
	if ($valid == 1) {
		$msgSuccess = "Success! The form data has been stored.";
		mysqli_query(
			$con,
			"INSERT INTO npe_blog(
				npe_title, 
				npe_message) 
			VALUES('$title', 
				'$message')"
		) or die(mysqli_error($con));
		// RESET
		$title = "";
		$message = "";
	}
}
?>

<h2>Insert</h2>
<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<div class="form-group">
		<label for="title">Title:</label>
		<input type="text" name="title" class="form-control" value="<?php if ($title) : ?><?php echo $title; ?><?php endif; ?>">
		<?php if ($valTitleMsg) : ?>
			<div class="alert alert-danger" role="alert">
				<?php echo $valTitleMsg; ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="form-group">
		<label for="message">Message:</label>
		<textarea name="message" class="form-control"><?php if ($message) : ?><?php echo $message; ?><?php endif; ?></textarea>
		<?php if ($valInputMsg) : ?>
			<div class="alert alert-danger" role="alert">
				<?php echo $valInputMsg; ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="nav-item dropdown">
		<a class="nav-link dropdown-toggle rainbow-text" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Emoticons</strong></a>
		<div class="dropdown-menu" aria-labelledby="dropdown01">
			<div class="dropdown-item">
				<!-- emoticon select -->
				<a href="javascript:emoticon(':D')">
					<img src="../emoticons/icon_biggrin.gif" alt="">
				</a>
				<a href="javascript:emoticon('8)')">
					<img src="../emoticons/icon_cool.gif" alt="">
				</a>
				<a href="javascript:emoticon(':(')">
					<img src="../emoticons/icon_sad.gif" alt="">
				</a>
				<a href="javascript:emoticon(':P')">
					<img src="../emoticons/icon_razz.gif" alt="">
				</a>
				<a href="javascript:emoticon(';)')">
					<img src="../emoticons/icon_wink.gif" alt="">
				</a>
			</div>
		</div>
	</div>
	<div class="form-group">
		<br />
		<label for="submit">&nbsp;</label>
		<input type="submit" name="submit" class="btn btn-info" value="Submit">
	</div>
</form>

<?php
include("../includes/footer.php");
?>