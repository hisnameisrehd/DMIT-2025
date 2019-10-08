<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mysql basics - read</title>
</head>
<body>
    <?php
    
    $con = mysqli_connect("localhost", "npeters5", "AIMFwNnBQnioFYc", "npeters5_dmit2025");
    // $con = mysqli_connect("server", "user", "password", "db name");

    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_errno();
    }

    // Reading from a DB: SELECT

    $result = mysqli_query($con, "SELECT * FROM basics") or die(mysqli_error($con));

    // loop trhough results

    while($row = mysqli_fetch_array($result)) {
        echo "\n<hr>";
        echo $row['name'] . "<br />" ;
        echo $row['address'] . "<br />" ;
        echo $row['occupation'] . "<br />" ;
        echo $row['id'] . "<br />" ;
    }

    ?>
    
</body>
</html>