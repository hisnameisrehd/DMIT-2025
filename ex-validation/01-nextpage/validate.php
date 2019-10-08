<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php

    $username = trim($_POST['username']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // echo "$username, $phone, $email, $message";

    // username
    if ($username == "") {
        echo "Please fill in a Name.";
        exit();
    }
    if (strlen($username) < 3) {
        echo "Please fill in a name of 3 characters or more.";
        exit();
    }
    if (strlen($username) > 20) {
        echo "Please fill in a name of 20 characters or less.";
        exit();
    }

    // a hypothetical phone validation exercise
    $phoneNotValid = phoneVal($phone);
    if ($phoneNotValid) {
        echo "Not valid.";
    }
    function phoneVal($num)
    {
        // example numbers:
        // 423-4677
        // 780-456-6658
        // 7804563352
        // (780) 456-7745
        // 780.554.2153
        $num = str_replace(" ", "", $num);
        $num = str_replace("-", "", $num);
        $num = str_replace(".", "", $num);
        $num = str_replace("(", "", $num);
        $num = str_replace(")", "", $num);

        if (!is_numeric($num)) {
            return "That is not a number.";
            exit();
        }
        if (strlen($num) != 10) {
            echo "That is not 10 characters.";
            exit();
        }
    }

    // email format
    if ($email != "") {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Please enter a correct email.";
            exit();
        }
    } else {
        echo "Please enter an email address.";
        exit();
    }

    // message validation
    $message = strip_tags($message)

    ?>

    <h1>Success!</h1>
    <p>If we see this, the form has submitted correctly</p>
</body>

</html>