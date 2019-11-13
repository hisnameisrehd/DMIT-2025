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
$image_id = $_GET['id']; // page-setter variable
//if not set we will give this a default value
if (!isset($image_id)) {
    $result = mysqli_query($con, "SELECT id FROM image_gallery LIMIT 1") or die(mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) {

        $image_id = $row['id'];
    }
}
// echo "<h1>$image_id</h1>";

// Step 3: If the user clicks submit, validate
if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    // echo "$title, $lname, $description"; // this is for testing
    $valid = 1;
    $msgPreError = "<div class=\"alert alert-danger\" role=\"alert\">";
    $msgPreSuccess = "<div class=\"alert alert-success\" role=\"alert\">";
    $msgPost = "</div>";
    if ((strlen($title) < 3) || (strlen($title) > 20)) {
        $valid = 0;
        // specific message
        $valFNameMsg = "Please enter a title between 3 and 20 characters.";
    }
    if ((strlen($description) < 20) || (strlen($description) > 512)) {
        $valid = 0;
        // specific message
        $valDescMsg = "Please enter a description between 20 and 512 characters.";
    }
    // success. if our boolean is still 1 then user form data is good.
    if ($valid == 1) {
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $msgSuccess = "Cowabunga! Form data has been stored.";
        // Editing or changing data in a DB: UPDATE
        mysqli_query($con, "UPDATE image_gallery SET 
                npe_title = '$title', 
                npe_description = '$description' 
                WHERE id=$image_id") or die(mysqli_error($con));
    }
}

// Step 1: Create a list characters which the user can select from
// Reading from a DB: SELECT
$result = mysqli_query($con, "SELECT * FROM image_gallery") or die(mysqli_error($con));
// loop trhough results
while ($row = mysqli_fetch_array($result)) {
    $title = $row['npe_title'];
    $image = $row['npe_file'];
    $id = $row['id'];


    $editLinks .= "\n<a class=\"edit-link\" id=\"style-links\" href=\"edit.php?id=$id\"><img src=\"../images/squares50/$image\" alt=\"thumbnail\" /></a>";
}

// Step 2: Prepopulate the fields based on the selected character
$result = mysqli_query($con, "SELECT * FROM image_gallery WHERE id = '$image_id'") or die(mysqli_error($con));
// loop trhough results
while ($row = mysqli_fetch_array($result)) {
    $title = $row['npe_title'];
    $description = $row['npe_description'];
    $imageFile = $row['npe_file'];
}


?>

<h2>Edit</h2>
<div class="row">
    <div class="col-5">
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
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" value="<?php if ($title) {
                                                                                echo $title;
                                                                            } ?>">
                <?php if ($valFNameMsg) {
                    echo $msgPreError . $valFNameMsg . $msgPost;
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
                <a class="btn btn-danger del" href="delete.php?id=<?php echo $image_id ?>">Delete</a>
                <script>
                    $(document).ready(function() {
                        $(".del").click(function() {
                            if (!confirm("Do you want to delete")) {
                                return false;
                            }
                        });
                    });
                </script>
            </div>
        </form>
    </div> <!-- \\ left column -->
    <div class="col-2">
        <!-- center column -->
        <style>
            .edit-link {
                margin-right: .3rem;
            }
            .edit-link:hover {
                box-shadow: 0 0 5px 0 black;
            }
        </style>
        <img src="../images/thumbs150/<?php if ($imageFile) {
                                            echo $imageFile;
                                        } ?>" alt="">
    </div> <!-- \\ center column -->
    <div class="col-5">
        <!-- right column -->
        <div class="row d-flex justify-content-start">
            <?php echo $editLinks; ?>
        </div>
    </div> <!-- \\ right column -->
</div>

<?php
include("../includes/footer.php");
?>