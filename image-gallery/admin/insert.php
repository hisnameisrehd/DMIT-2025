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

if(isset($_POST['mysubmit'])){
    $valid = 1;
    $valMessage .= "";

    // check type
    if($_FILES['myfile']['type'] != "image/jpeg"){
        $valid = 0;
        $valMessage .= "Not a JPEG image.";
    }

    // check size
    if($_FILES['myfile']['size'] > (10 * 1024 * 1024)){
        $valid = 0;
        $valMessage .= "Image too large. Cannot be over 10MB.";
    }

    // if valid
    if($valid == 1){
        // move_uploaded_file
        if(move_uploaded_file ( $_FILES['myfile']['tmp_name'] , "originals/" . $_FILES['myfile']['name'] )){
            // call resize function
            $thisFile = "originals/" . $_FILES['myfile']['name'];
            resizeImage($thisFile, "thumbs/", 200);
            resizeImage($thisFile, "display/", 750);

            // create a database
            // filename we get from $_FILES['myfile']['name'];

            echo "<h3>UPLOADED</h3>";
        } else {
            echo "<h3>ERROR</h3>";
        }
    } else {
        echo "<h3>ERROR</h3>";
    }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="myfile"></label>
		<input class="form-control" type="file" name="myfile"><br />
	</div>
	<input type="submit" name="mysubmit">
</form>

<?php
include("../includes/footer.php");
?>