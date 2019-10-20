<?php
// retrieve the user submitted data and echo to test.
// $username = $_POST['username'];
// $password = $_POST['password'];

include("/home/npeters5/data/data.php");
if (isset($_POST['mysubmit'])) {
	// echo "submitted";
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	// echo "$username, $password";
	if (($username == $username_good) && (password_verify($password, $pw_enc))) {
		session_start();
		$_SESSION['PHP_Test_Secure'] = session_id();

		header("Location:insert.php"); // redirect user

		// $msg = "SUCCESS!";


	} else {
		if ($username != "" && $password != "") {
			$msg = "Incorrect Login";
		} else {
			$msg = "Please enter a username & password.";
		}
	} //\username, pw good
}
include("../includes/header.php");

// echo "$username_good, $pw_enc";

?>

<h1>Login</h1>
<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<div class="form-group">
		<label for="username">Username:</label>
		<input class="form-control" type="text" name="username">
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<input class="form-control" type="password" name="password">
	</div>
	<div class="form-group">
		<label for="submit">&nbsp;</label>
		<input type="submit" name="mysubmit" class="btn btn-info" value="Submit">
	</div>
	<?php
	if ($msg) {
		echo "\n\t<div class=\"alert alert-info\">$msg</div>";
	}
	?>
</form>
<?php
include("../includes/footer.php");
?>