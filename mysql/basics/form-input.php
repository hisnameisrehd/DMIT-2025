<?php
if (isset($_POST['mysubmit'])) {
    
    $name = trim($_POST['name']);
    $address = trim($_POST['address']);
    $occupation = trim($_POST['occupation']);
    $con = mysqli_connect("localhost", "npeters5", "AIMFwNnBQnioFYc", "npeters5_dmit2025");
    // $con = mysqli_connect("server", "user", "password", "db name");
    
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_errno();
    }

    // Creating data in a DB: INSERT

    mysqli_query($con, 
    "INSERT INTO basics(name, address, occupation) 
    VALUES('$name', '$address', '$occupation')") or die(mysqli_error($con));
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>mysql basics - CRUD</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.formstyle {
			/* optional: in case you don't like the really wide form */
			margin: 0 auto;
			padding: 0;
			max-width: 650px;
		}
	</style>
</head>

<body>
	<div class="container">

		<form name="myform" class="formstyle" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
					<h1>mysql basics - form</h1>
					<div class="form-group">
						<label class="required" for="name">Name:</label>
						<input type="text" class="form-control" name="name" value="<?php if ($name) {
																						echo $name;
																					} ?>">
                    </div>
                    <div class="form-group">
						<label class="required" for="address">Address:</label>
						<input type="text" class="form-control" name="address" value="<?php if ($address) {
																						echo $address;
																					} ?>">
                    </div>
                    <div class="form-group">
						<label class="required" for="occupation">Occupation:</label>
						<input type="text" class="form-control" name="occupation" value="<?php if ($occupation) {
																						echo $occupation;
																					} ?>">
                    </div>
					<input type="submit" class="btn btn-primary" value="Create" name="mysubmit">
                    
		</form>

	</div><!-- / .container -->

</body>

</html>