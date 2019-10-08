<?php
// retrieve the user submitted data and echo to test.
// $username = $_POST['username'];
// $password = $_POST['password'];

include("/home/npeters5/data/data.php");
include("../includes/header.php");

// echo "$username_good, $pw_enc";

//create a conditional that detect if the user has clicked the button
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

?>

<div class="jumbotron clearfix" style="text-align: center;background: #492b2b; color: rgb(255, 223, 223);">
	<h1 style="font-size:3.5rem;">~<?php echo APP_NAME ?>~</h1><span style="font-size: 2rem; float:right; ">Please Login</span>
</div>
<div class="d-block">
	<div class="row-container justify-content-center">

		<form style="width:65vw;" name="myform" class="formstyle" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

			<!-- you can copy/paste one of these form-groups, then change the form element and label within -->
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" name="username">
			</div>
			<!-- / form-group -->

			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" name="password">
			</div>



			<input type="submit" class="btn btn-default" name="mysubmit">
			<br />
			<br />
			<?php
			if ($msg) {
				echo "\n\t<div class=\"alert alert-info\">$msg</div>";
			}
			?>

		</form>
	</div>
</div>
<?php
include("../includes/footer.php");
?>