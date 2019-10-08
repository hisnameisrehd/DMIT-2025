<?php
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$message = trim($_POST['message']);
$url = trim($_POST['url']);




if(isset($_POST['mysubmit'])) {
    // echo "$username, $email, $message, $url"; //testing
    $valid = 1;
    $msg = "";

    // username format
    if((strlen($username) < 3) || (strlen($username) > 20))
    {
        $valid = 0;
        $msg .= "\n<br />Please fill in a username between 3 and 20 characters.";
    }

     // email format
     if ($email != "") {
        $valid = 0;
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg .= "\n<br />Please enter a correct email.";
        }
        else {
            $valid = 1;
        }
    } else {
        $valid = 0;
        $msg .= "\n<br />Please enter an email address.";
    }

    if($valid == 1)
    {
        $msg = "\n<br />Success!";
    }
}// \if statement
?>
<!DOCTYPE html>
<html>

<head>
    <title>Samepage - Validation</title>
    <!-- These must be in place to use Bootstrap ! -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        html,
        body {
            background: rgb(219, 219, 255);
        }

        .formstyle {
            /* optional: in case you don't like the really wide form */
            max-width: 450px;
        }

        #smaller {
            margin: 0 auto;
            margin-top: 3rem;
            margin-bottom: 3rem;
            width: 70vw;
            padding-top: 2rem;
            padding-bottom: 4rem;
            background: rgb(243, 243, 255);
        }
    </style>
</head>

<body>
    <div id="smaller" class="container">

        <h1>Page 2 - Samepage Validation</h1>

        <form name="myform" class="formstyle" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

            <div class="form-group">
                <label for="username">Name:</label>
                <input type="text" class="form-control" name="username" value="<?php if($username){echo "$username";} ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value="<?php if($email){echo $email;} ?>">
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" name="message" cols="30" rows="10" ><?php if($message){echo $message;} ?></textarea>
            </div>
            <div class="form-group">
                <label for="url">URL:</label>
                <input type="text" class="form-control" name="url" value="<?php if($url){echo $url;} ?>">
            </div>



            <input type="submit" class="btn btn-primary" name="mysubmit">
        </form>
        <?php
        if($msg)
        {
            echo "$msg";
        }
        ?>

    </div><!-- / .container -->
</body>

</html>