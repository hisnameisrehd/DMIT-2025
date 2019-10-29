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
//if not set we will give this a default value
$blog_id = $_GET['blogs'];
// echo $blog_id;
if (!isset($blog_id)) {
    $result = mysqli_query($con, "SELECT bid FROM npe_blog ORDER BY bid DESC LIMIT 1 ") or die(mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) {
        $blog_id = $row['bid'];
    }
}
// echo "<h1>$blog_id</h1>";
?>

<?php if (isset($_POST['submit'])) {
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
        $title = trim($_POST['title']);
        $message = trim($_POST['message']);
        // Editing or changing data in a DB: UPDATE
        mysqli_query(
            $con,
            "UPDATE npe_blog 
            SET
				npe_title = '$title',
				npe_message = '$message' 
        WHERE bid = '$blog_id'"
        ) or die(mysqli_error($con));
    }
}

// Prepopulate the fields based on the selected post
$result = mysqli_query($con, "SELECT * FROM npe_blog WHERE bid = '$blog_id'") or die(mysqli_error($con));
// loop trhough results
while ($row = mysqli_fetch_array($result)) {
    $title = $row['npe_title'];
    $message = $row['npe_message'];
    $id = $row['bid'];
}
?>

<h2>Edit</h2>

<form method="get" action="edit.php?id=<?php echo $_POST['blogs']; ?>">

    <div class="form-group">
        <label for="blogs">Blog Post:</label>
        <select class="form-control" name="blogs" onchange="this.form.submit()">
            <?php
            // Reading from a DB: SELECT
            $result = mysqli_query($con, "SELECT * FROM npe_blog ORDER BY bid DESC") or die(mysqli_error($con));
            // loop trhough results
            $editLinks = [];
            while ($row = mysqli_fetch_array($result)) {
                $oTitle = $row['npe_title'];
                $oMessage = $row['npe_message'];
                $oId = $row['bid'];

                if ($blog_id == $oId) {
                    array_push($editLinks, "\n<option name=\"postitem\" value=\"$oId\" selected=selected>$oTitle</option>");
                } else {
                    array_push($editLinks, "\n<option name=\"postitem\" value=\"$oId\">$oTitle</option>");
                }
            }
            foreach ($editLinks as $option) {
                echo $option;
            }
            ?>
        </select>
    </div>
</form>

<form class="pb-5" id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

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
        <a class="nav-link dropdown-toggle rainbow-text p-0 pl-1" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong class="p-1" style="border-radius:6px;font-size:1.2rem;">Emoticons</strong></a>
        <div class="dropdown-menu bg-dark" aria-labelledby="dropdown01">
            <div class="dropdown-item">
                <!-- emoticon select -->
                <a href="javascript:emoticon(':S')">
                    <img src="../emoticons/icon_confused.gif" alt="">
                </a>
                <a href="javascript:emoticon(':D')">
                    <img src="../emoticons/icon_biggrin.gif" alt="">
                </a>
                <a href="javascript:emoticon('8)')">
                    <img src="../emoticons/icon_cool.gif" alt="">
                </a>
                <a href="javascript:emoticon('O-O')">
                    <img src="../emoticons/icon_eek.gif" alt="">
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
    <div class="form-group mb-5">
        <br />
        <label for="submit">&nbsp;</label>
        <input type="submit" name="submit" class="btn btn-warning" value="Update">
        <a class="btn btn-danger del" href="delete.php?id=<?php echo $blog_id ?>">Delete</a>
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

<?php
include("../includes/footer.php");
?>