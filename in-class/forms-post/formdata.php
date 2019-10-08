<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Data - POST</title>
</head>
<body>
    <h1>Form Data - POST</h1>
    <?php

        // $_POST to receive from form

        $username = $_POST['user'];
        $email = $_POST['emailaddress'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $gender = $_POST['sex'];
        $comments = $_POST['comments'];
        $terms = $_POST['terms'];

        // for testing purposes 
        echo "$username, $email, $address1, $address2, $city, $state, $country, $gender, $comments, $terms <br /><br />";

        if($username){
            echo "<b>Name:</b> " . $username . "<br />";
        }
        if($email){
            echo "<b>Email:</b> " . $email . "<br />";
        }
        if($address1){
            echo "<b>Address 1:</b> " . $address1 . "<br />";
        }
        if($address2){
            echo "<b>Address 2:</b> " . $address2 . "<br />";
        }
        if($city){
            echo "<b>City:</b> " . $city . "<br />";
        }
        if($state){
            echo "<b>State:</b> " . $state . "<br />";
        }
        if($country){
            echo "<b>Country:</b> " . $country . "<br />";
        }
        if($comments){
            echo "<b>Comments:</b> " . $comments . "<br />";
        }
        if($terms){
            echo "<b>Terms:</b> " . "Accepted" . "<br />";
        }
        if(!$terms){
            echo "<b>State:</b> " . "Declined" . "<br />";
        }

    ?>
    
</body>
</html>