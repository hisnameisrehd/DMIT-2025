<?php
session_start();

include("includes/header.php");

if (isset($_POST['submit'])) {
    $searchterm = trim($_POST['searchterm']);
    $valid = 1;

    if (trim($searchterm) == "") {
        $valid = 0;
        $emptyMsg = "<div class=\"alert alert-danger\" role=\"alert\">You Must Provide Search Terms</div>";
    }
}
?>

<h1>Search</h1>
<!-- Search form -->
<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <div class="form-group">
        <label for="searchterm">Search:</label>
        <input class="form-control" type="text" name="searchterm" value="<?php if (trim($searchterm) != "") {
                                                                                echo $searchterm;
                                                                            } ?>">
        <?php
        if (trim($emptyMsg) != "" && $valid == 0) {
            echo $emptyMsg;
        }
        ?>
    </div>
    <div class="form-group">
        <label for="submit">&nbsp;</label>
        <input type="submit" name="submit" class="btn btn-info" value="Submit">
    </div>
</form>

<?php if (isset($_POST['submit'])) : ?>
    <?php $searchterm = trim($_POST['searchterm']); ?>
    <?php
        if ($searchterm != "") {

            $sql = "SELECT * FROM npe_contacts WHERE
    npe_business_name LIKE '$searchterm'
    OR npe_person_name LIKE '$searchterm'
    OR npe_description LIKE '%$searchterm%'";

            $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        }
        ?>
    <?php if ($result != "") : ?>
        <?php if ($row = mysqli_num_rows($result) > 0) : ?>
            <!-- Go ahead and do some HTML/CSS styling in here...I dare you! -->
            <style>
                .search-link {
                    text-decoration: none;
                    color: black;
                }

                .search-link-header {
                    font-size: 1.3rem;
                    font-weight: 700;
                }

                .search-link :hover {
                    text-decoration: none;
                    color: black;
                    background: lightgray;
                }
            </style>
            <div class="alert alert-success" role="alert">Success! Showing results for <?php echo $searchterm; ?></div>

            <?php while ($row = mysqli_fetch_array($result)) : ?>
                <a class="search-link" href="companyprofile.php?id=<?php echo $row['cid']; ?>">
                    <hr />
                    <div class="d-inline-block">
                        <p>
                            <span class="search-link-header"><?php echo $row['npe_business_name']; ?></span>
                            <br />
                            <?php if ($row['npe_description'] != "") : ?>
                                <?php echo $row['npe_description']; ?>
                            <?php endif; ?>
                            <?php if ($row['npe_person_name'] != "") : ?>
                                <br />
                                <b>Contact:</b> <?php echo $row['npe_person_name']; ?>
                            <?php endif; ?>
                            <br />
                            <i>Phone: <?php echo $row['npe_phone'] ?></i>
                        </p>
                    </div>
                </a>
            <?php endwhile; ?>
            <!-- end mysqli_fetch_array() -->
        <?php else : ?>
            <div class="alert alert-warning" role="alert">Sorry, no results for <?php echo $searchterm; ?></div>
        <?php endif; ?>
        <!-- end result = NULL ? -->
    <?php endif; ?>
    <!-- end mysqli_num_rows() -->
<?php endif; ?>
<!-- end isset() -->

<?php
include("includes/footer.php");
?>