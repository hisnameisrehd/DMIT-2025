<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mysql basics - delete</title>
</head>
<body>
    <?php
    
    $con = mysqli_connect("localhost", "npeters5", "AIMFwNnBQnioFYc", "npeters5_dmit2025");
    // $con = mysqli_connect("server", "user", "password", "db name");

    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_errno();
    }

    // Removing data in a DB: DELETE

    mysqli_query($con, "DELETE FROM basics
    WHERE id=7") or die(mysqli_error($con));

    ?>
    
</body>
</html>