<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receiving Form Data</title>
</head>
<body>
    <h1>Receiving Form Data With PHP - GET</h1>

    <?php


    /*
        to retreive get vars, we use $_GET['name-of-form-element']
    */
    if (trim($_GET['user'])){
        echo "<b>Name</b> " . $_GET['user'] . "<br />";
    }
    if (trim($_GET['emailaddress'])){
        echo "<b>Email</b> " . $_GET['emailaddress'] . "<br />";
    }
    //
    // do the rest of the form
    if (trim($_GET['address1'])){
        echo "<b>Address 1</b> " . $_GET['address1'] . "<br />";
    }
    if (trim($_GET['address2'])){
        echo "<b>Address 2</b> " . $_GET['address2'] . "<br />";
    }
    if (trim($_GET['city'])){
        echo "<b>City</b> " . $_GET['city'] . "<br />";
    }
    if (trim($_GET['state'])){
        echo "<b>State</b> " . $_GET['state'] . "<br />";
    }
    if (trim($_GET['country'])){
        echo "<b>Country</b> " . $_GET['country'] . "<br />";
    }
    if (trim($_GET['sex'])){
        echo "<b>Gender</b> " . $_GET['sex'] . "<br />";
    }
    if (trim($_GET['comments'])){
        echo "<b>Comments</b> " . $_GET['comments'] . "<br />";
    }
    if (trim($_GET['terms'])){
        echo "<b>Terms</b> " . "Accepted" . "<br />";
    }
    if (!trim($_GET['terms'])){
        echo "<b>Terms</b> " . "Declined" . "<br />";
    }
    ?>

</body>
</html>