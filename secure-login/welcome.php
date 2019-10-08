<?php
    session_start();
    if(isset($_SESSION['PHP_Test_Secure']))
    {
        // echo "Logged In.";
    }
    else
    {
        //when using redirect, make sure that everything else works first. If not, remove redirect to debug.
        // echo "Not Logged In.";
        header("Location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome</h1>
</body>
</html>