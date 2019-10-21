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
$contact_id = $_GET['id']; // page-setter variable
//if not set we will give this a default value
if (!isset($contact_id)) {
    $result = mysqli_query($con, "SELECT cid FROM npe_contacts LIMIT 1") or die(mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) {
        $contact_id = $row['id'];
    }
}
// echo "<h1>$char_id</h1>";
?>

<?php
// Step 3: If the user clicks submit, validate
if (isset($_POST['submit'])) {
    // DECLARE VARIABLES
    $valid = 1;
    $msgPreError = "<div class=\"alert alert-danger\" role=\"alert\">";
    $msgPreSuccess = "<div class=\"alert alert-success\" role=\"alert\">";
    $msgPost = "</div>";
    $busName = trim($_POST['busname']);
    $contactName = trim($_POST['contactname']);
    $email = trim($_POST['email']);
    $webURL = trim($_POST['website']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $province = trim($_POST['province']);
    $postal = trim($_POST['postal']);
    $description = trim($_POST['description']);
    $resume = trim($_POST['resume']);
    /*
    Tesing the variables 
    - drag the echo out of comment field to test
    echo "$busName, $contactName, $email, $webURL, $phone, $address, $city, $province, $description, $resume";
    echo "valid = $valid";
*/

    // FUNCTIONS
    function phoneVal($num)
    {
        $num = str_replace(" ", "", $num);
        $num = str_replace("-", "", $num);
        $num = str_replace(".", "", $num);
        $num = str_replace("(", "", $num);
        $num = str_replace(")", "", $num);
        if (!is_numeric($num)) {
            return "That is not a number.";
        } else {
            return $num;
        }
    }

    // VALIDATION
    // Business name
    if ((strlen($busName) < 3) || (strlen($busName) > 20)) {
        $valid = 0;
        $valBusNameMsg = "Please enter a business name between 3 and 20 characters.";
    }
    // Email
    if ($email != "") {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // validates correct email format
            $valid = 0;
            $valEmailMsg = "\nPlease fill in a correct email address.";
        }
    } else {
        $valid = 0;
        $valEmailMsg = "\nPlease fill in an email address.";
    }
    // Website URL
    if (!filter_var($webURL, FILTER_VALIDATE_URL)) {
        $valid = 0;
        $valURLMsg = "You enter a valid URL like \"https://www.w3schools.com\".";
    }
    // Phone number
    $phoneNotValid = phoneVal($phone);
    if ($phoneNotValid) {
        if (strlen(phoneVal($phone)) != 10) {
            $valid = 0;
            $valPhoneMsg = "Please enter a 10 digit number.";
        }
    }

    // success. if our boolean is still 1 then user form data is good.
    if ($valid == 1) {
        $busName = trim($_POST['busname']);
        $contactName = trim($_POST['contactname']);
        $email = trim($_POST['email']);
        $webURL = trim($_POST['website']);
        $phone = trim($_POST['phone']);
        $address = trim($_POST['address']);
        $city = trim($_POST['city']);
        $province = trim($_POST['province']);
        $postal = trim($_POST['postal']);
        $description = trim($_POST['description']);
        $resume = trim($_POST['resume']);
        $msgSuccess = "Success! Form data has been stored.";
        // Editing or changing data in a DB: UPDATE
        mysqli_query(
            $con,
            "UPDATE npe_contacts 
            SET
                npe_business_name = '$busName', 
				npe_person_name = '$contactName', 
				npe_email = '$email',
				npe_url = '$webURL',
				npe_phone = '$phone',
				npe_address1 = '$address',
				npe_postal = '$postal',
				npe_city = '$city',
				npe_province = '$province',
				npe_resume = '$resume',
				npe_description = '$description' 
        WHERE cid=$contact_id"
        ) or die(mysqli_error($con));
    }
}

// Step 1: Create a list characters which the user can select from
// Reading from a DB: SELECT
$result = mysqli_query($con, "SELECT * FROM npe_contacts") or die(mysqli_error($con));
// loop trhough results
while ($row = mysqli_fetch_array($result)) {
    $busName = $row['npe_business_name'];
    $contactName = $row['npe_person_name'];
    $email = $row['npe_email'];
    $webURL = $row['npe_url'];
    $phone = $row['npe_phone'];
    $address = $row['npe_address1'];
    $postal = $row['npe_postal'];
    $city = $row['npe_city'];
    $province = $row['npe_province'];
    $resume = $row['npe_resume'];
    $description = $row['npe_description'];
    $id = $row['cid'];

    if ($contact_id == $id) {
        $editLinks .= "\n<hr><strong><a style=\"color:blue;\" id=\"style-links\" href=\"edit.php?id=$id\"><div class=\"row pl-2\"><div class=\"col-sm\">$busName</div></div></a></strong>";
    } else {
        $editLinks .= "\n<hr><a id=\"style-links\" href=\"edit.php?id=$id\"><div class=\"row pl-2\"><div class=\"col-sm\">$busName</div></div></a>";
    }
}

// Step 2: Prepopulate the fields based on the selected character
$result = mysqli_query($con, "SELECT * FROM npe_contacts WHERE cid = '$contact_id'") or die(mysqli_error($con));
// loop trhough results
while ($row = mysqli_fetch_array($result)) {
    $busName = $row['npe_business_name'];
    $contactName = $row['npe_person_name'];
    $email = $row['npe_email'];
    $webURL = $row['npe_url'];
    $phone = $row['npe_phone'];
    $address = $row['npe_address1'];
    $postal = $row['npe_postal'];
    $city = $row['npe_city'];
    $province = $row['npe_province'];
    $resume = $row['npe_resume'];
    $description = $row['npe_description'];

    // echo "$busName, $contactName, $email, $webURL, $phone, $address, $city, $province, $description, $resume";
}

?>

<div class="jumbotron clearfix">
    <h1>Edit</h1>
</div>

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
                <label class="required" for="busname">Business Name:</label>
                <input type="text" name="busname" class="form-control" value="<?php if ($busName) {
                                                                                    echo $busName;
                                                                                } ?>">
                <?php if ($valBusNameMsg) {
                    echo $msgPreError . $valBusNameMsg . $msgPost;
                } ?>
            </div>
            <div class="form-group">
                <label for="contactname">Contact Name:</label>
                <input type="text" name="contactname" class="form-control" value="<?php if ($contactName) {
                                                                                        echo $contactName;
                                                                                    } ?>">
                <?php if ($valContactNameMsg) {
                    echo $msgPreError . $valContactNameMsg . $msgPost;
                } ?>
            </div>
            <div class="form-group">
                <label class="required" for="email">Email:</label>
                <input type="text" name="email" class="form-control" value="<?php if ($email) {
                                                                                echo $email;
                                                                            } ?>">
                <?php if ($valEmailMsg) {
                    echo $msgPreError . $valEmailMsg . $msgPost;
                } ?>
            </div>
            <div class="form-group">
                <label class="required" for="website">Website URL:</label>
                <input type="text" name="website" class="form-control" value="<?php if ($webURL) {
                                                                                    echo $webURL;
                                                                                } ?>">
                <?php if ($valURLMsg) {
                    echo $msgPreError . $valURLMsg . $msgPost;
                } ?>
            </div>
            <div class="form-group">
                <label class="required" for="phone">Phone Number:</label>
                <input type="text" name="phone" class="form-control" value="<?php if ($phone) {
                                                                                echo $phone;
                                                                            } ?>">
                <?php if ($valPhoneMsg) {
                    echo $msgPreError . $valPhoneMsg . $msgPost;
                } ?>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" class="form-control" value="<?php if ($address) {
                                                                                    echo $address;
                                                                                } ?>">
                <?php if ($valAddressMsg) {
                    echo $msgPreError . $valAddressMsg . $msgPost;
                } ?>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" class="form-control" value="<?php if ($city) {
                                                                                echo $city;
                                                                            } ?>">
                <?php if ($valCityMsg) {
                    echo $msgPreError . $valCityMsg . $msgPost;
                } ?>
            </div>
            <div class="form-group">
                <label for="province">Province:</label>
                <select class="form-control" name="province">
                    <option value="">Please Select A Province</option>
                    <option value="AB" <?php if (isset($province) && ($province == "AB")) {
                                            echo "selected";
                                        } ?>>Alberta</option>
                    <option value="BC" <?php if (isset($province) && ($province == "BC")) {
                                            echo "selected";
                                        } ?>>British Columbia</option>
                    <option value="MB" <?php if (isset($province) && ($province == "MB")) {
                                            echo "selected";
                                        } ?>>Manitoba</option>
                    <option value="NB" <?php if (isset($province) && ($province == "NB")) {
                                            echo "selected";
                                        } ?>>New Brunswick</option>
                    <option value="NL" <?php if (isset($province) && ($province == "NL")) {
                                            echo "selected";
                                        } ?>>Newfoundland and Labrador</option>
                    <option value="NS" <?php if (isset($province) && ($province == "NS")) {
                                            echo "selected";
                                        } ?>>Nova Scotia</option>
                    <option value="ON" <?php if (isset($province) && ($province == "ON")) {
                                            echo "selected";
                                        } ?>>Ontario</option>
                    <option value="PE" <?php if (isset($province) && ($province == "PE")) {
                                            echo "selected";
                                        } ?>>Prince Edward Island</option>
                    <option value="QC" <?php if (isset($province) && ($province == "QC")) {
                                            echo "selected";
                                        } ?>>Quebec</option>
                    <option value="SK" <?php if (isset($province) && ($province == "SK")) {
                                            echo "selected";
                                        } ?>>Saskatchewan</option>
                    <option value="NT" <?php if (isset($province) && ($province == "NT")) {
                                            echo "selected";
                                        } ?>>Northwest Territories</option>
                    <option value="NU" <?php if (isset($province) && ($province == "NU")) {
                                            echo "selected";
                                        } ?>>Nunavut</option>
                    <option value="YT" <?php if (isset($province) && ($province == "YT")) {
                                            echo "selected";
                                        } ?>>Yukon</option>
                </select>
                <?php if ($valProvinceMsg) {
                    echo $msgPreError . $valProvinceMsg . $msgPost;
                } ?>
            </div>
            <div class="form-group">
                <label for="postal">Postal Code:</label>
                <input type="text" name="postal" class="form-control" value="<?php if ($postal) {
                                                                                    echo $postal;
                                                                                } ?>">
                <?php if ($valPostalMsg) {
                    echo $msgPreError . $valPostalMsg . $msgPost;
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
            <div class="form-check">
                <label class="form-check-label">
                    <input name="resume" type="checkbox" class="form-check-input" value="1" <?php if ($resume) {
                                                                                                echo "checked";
                                                                                            } ?>>Send Résumé
                </label>
            </div>
            <br />
            <div class="form-group">
                <label for="submit">&nbsp;</label>
                <input type="submit" name="submit" class="btn btn-info" value="Submit">
                <a class="btn btn-danger del" href="delete.php?id=<?php echo $contact_id ?>">Delete</a>
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