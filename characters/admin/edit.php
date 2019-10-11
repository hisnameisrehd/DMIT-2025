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

?>
<?php
$char_id = $_GET['id']; // page-setter variable
//if not set we will give this a default value
if (!isset($char_id)) {
    $result = mysqli_query($con, "SELECT id FROM characters LIMIT 1") or die(mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) {

        $char_id = $row['id'];
    }
}
// echo "<h1>$char_id</h1>";

// Step 3: If the user clicks submit, validate
if (isset($_POST['submit'])) {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $description = trim($_POST['description']);
    // echo "$fname, $lname, $description"; // this is for testing
    $valid = 1;
    $msgPreError = "<div class=\"alert alert-danger\" role=\"alert\">";
    $msgPreSuccess = "<div class=\"alert alert-success\" role=\"alert\">";
    $msgPost = "</div>";
    if ((strlen($fname) < 3) || (strlen($fname) > 20)) {
        $valid = 0;
        // specific message
        $valFNameMsg = "Please enter a name between 3 and 20 characters.";
    }
    if ((strlen($lname) < 3) || (strlen($lname) > 20)) {
        $valid = 0;
        // specific message
        $valLNameMsg = "Please enter a race type between 3 and 20 characters.";
    }
    if ((strlen($description) < 20) || (strlen($description) > 512)) {
        $valid = 0;
        // specific message
        $valDescMsg = "Please enter a description between 20 and 512 characters.";
    }
    // success. if our boolean is still 1 then user form data is good.
    if ($valid == 1) {
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $description = trim($_POST['description']);
        $msgSuccess = "Cowabunga! Form data has been stored.";
        // Editing or changing data in a DB: UPDATE
        mysqli_query($con, "UPDATE characters SET 
                first_name = '$fname', 
                last_name = '$lname', 
                description = '$description' 
                WHERE id=$char_id") or die(mysqli_error($con));
    }
}

// Step 1: Create a list characters which the user can select from
// Reading from a DB: SELECT
$result = mysqli_query($con, "SELECT * FROM characters") or die(mysqli_error($con));
// loop trhough results
while ($row = mysqli_fetch_array($result)) {
    $fname = $row['first_name'];
    $lname = $row['last_name'];
    $id = $row['id'];

    $editLinks .= "\n<hr><a id=\"style-links\" href=\"edit.php?id=$id\"><div class=\"row pl-2\"><div class=\"col-sm\">$fname $lname</div></div></a>";
}

// Step 2: Prepopulate the fields based on the selected character
$result = mysqli_query($con, "SELECT * FROM characters WHERE id = '$char_id'") or die(mysqli_error($con));
// loop trhough results
while ($row = mysqli_fetch_array($result)) {
    $fname = $row['first_name'];
    $lname = $row['last_name'];
    $description = $row['description'];

    // echo "$fname $lname";
}


?>
<style>
    @font-face {
        font-family: 'turtle';
        src: url(../fonts/Turtles.otf),
            url(../fonts/Turtles.woff);
    }

    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: 'turtle';
        font-size: 5rem;
    }
</style>
<h2>Edit</h2>
<div class="row">
    <div class="col">
        <!-- left column -->
        <!-- 
            $_SERVER['PHP_SELF'] means goto the current file
                - does not retain info
            $_SERVER['REQUEST_URI'] is also same page. 
                - does retain info
        -->
        <form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
            <?php if ($valid == 1) {
                echo $msgPreSuccess . $msgSuccess . $msgPost;
            } ?>
            <div class="form-group">
                <label for="fname">Full Name:</label>
                <input type="text" name="fname" class="form-control" value="<?php if ($fname) {
                                                                                echo $fname;
                                                                            } ?>">
                <?php if ($valFNameMsg) {
                    echo $msgPreError . $valFNameMsg . $msgPost;
                } ?>
            </div>
            <div class="form-group">
                <label for="lname">Race / Type:</label>
                <input type="text" name="lname" class="form-control" value="<?php if ($lname) {
                                                                                echo $lname;
                                                                            } ?>">
                <?php if ($valLNameMsg) {
                    echo $msgPreError . $valLNameMsg . $msgPost;
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
            <div class="form-group">
                <label for="submit">&nbsp;</label>
                <input type="submit" name="submit" class="btn btn-info" value="Submit">
                <a class="btn btn-danger" href="delete.php?id=<?php echo $char_id ?>">Delete</a>
            </div>
        </form>
    </div> <!-- \\ left column -->
    <div class="col">
        <!-- right column -->
        <div class="navlinks">
            <?php echo $editLinks; ?>
        </div>
    </div> <!-- \\ right column -->
</div>

<?php
include("../includes/footer.php");
?>