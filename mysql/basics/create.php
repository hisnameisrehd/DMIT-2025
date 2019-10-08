<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mysql basics - create</title>
</head>
<body>
    <?php
    
    $con = mysqli_connect("localhost", "npeters5", "AIMFwNnBQnioFYc", "npeters5_dmit2025");
    // $con = mysqli_connect("server", "user", "password", "db name");

    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_errno();
    }

    // Creating data in a DB: INSERT

    mysqli_query($con, 
    "INSERT INTO basics(name, address, occupation) 
    VALUES('Barney Ruubble', '456 Bedrock Ave', 'Truck Driver')") or die(mysqli_error($con));

    ?>
    
</body>
</html>