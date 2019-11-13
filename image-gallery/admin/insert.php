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
include("../includes/_functions.php")
?>

<?php
if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$filename = $_POST['myfile'];

	$valid = 1;
	$valMessage .= "";

	// Validation Rule for File Type
	if ($_FILES['myfile']['type'] != "image/jpeg") {
		$valid = 0;
		$valMessage .= "Not a JPG image.";
	}
	// Validation Rule for File Size
	if ($_FILES['myfile']['size'] > (8 * 1024 * 1024)) {
		$valid = 0;
		$valMessage .= "File is too large.";
	}



	if ($valid == 1) {
		$uniqidFileName = "image_" . uniqid() . ".jpg";

		if (move_uploaded_file($_FILES['myfile']['tmp_name'], "../images/originals/" . $uniqidFileName)) {
			
			$thisFile = "../images/originals/" . $uniqidFileName;

			createImageCopy($thisFile,  "../images/display/", 800);
			createImageCopy($thisFile,  "../images/thumbs100/", 100);
			createImageCopy($thisFile,  "../images/thumbs150/", 150);
			createImageCopy($thisFile,  "../images/thumbs200/", 200);
			createSquareImageCopy($thisFile, "../images/squares150/", 150);
			createSquareImageCopy($thisFile, "../images/squares50/", 50);

			mysqli_query($con, "INSERT INTO image_gallery(npe_title, npe_description, npe_file) VALUES('$title','$description','$uniqidFileName')") or die(mysqli_error($con));

			echo "<h3>Upload Successful</h3>";
		} else {
			echo "<h3>ERROR</h3>";
		}
		echo "<h2>success</h2>";
	} else {
		echo "<h2>" . $valMessage . "</h2>";
	}
}
?>

<h2>Title</h2>
<form id="myform" name="myform" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<div class="form-group">
		<label for="title">Title</label>
		<input type="title" name="title" class="form-control">
	</div>
	<div class="form-group">
		<label for="description">description</label>
		<textarea name="description" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label for="myfile">file</label>
		<input type="file" name="myfile" class="form-control">

	</div>
	<div class="form-group">
		<label for="submit">&nbsp;</label>
		<input type="submit" name="submit" class="btn btn-info" value="Submit">
	</div>
</form>
<?php
include("../includes/footer.php");
?>