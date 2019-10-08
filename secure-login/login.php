<?php
	// retrieve the user submitted data and echo to test.
	// $username = $_POST['username'];
	// $password = $_POST['password'];

	include("/home/npeters5/data/data.php");
	// echo "$username_good, $pw_enc";

	//create a conditional that detect if the user has clicked the button
	if(isset($_POST['mysubmit']))
	{
		// echo "submitted";
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		// echo "$username, $password";
		if(($username == $username_good) && (password_verify($password, $pw_enc)))
		{
			session_start();
			$_SESSION['PHP_Test_Secure'] = session_id();

			header("Location:welcome.php");// redirect user

			// $msg = "SUCCESS!";


		}
		else
		{
			if($username != "" && $password != "")
			{
				$msg = "Incorrect Login";
			}
			else
			{
				$msg = "Please enter a username & password.";
			}
		}//\username, pw good
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Secure Login</title>
	<!-- These must be in place to use Bootstrap ! -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">
		.formstyle{ /* optional: in case you don't like the really wide form */
			max-width:450px;
		}

	</style>
</head>
<body>
	<div class="container">

		<h1>Please Login</h1>

		<form name="myform" class="formstyle" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

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
			if($msg){
				echo "\n\t<div class=\"alert alert-info\">$msg</div>";
			}
		  ?>

		</form>


	</div><!-- / .container -->

</body>
</html>