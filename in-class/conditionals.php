<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conditionals</title>
</head>
<body>
<h1>Conditionals</h1>
<h3>IF/Then Statement</h3>
<?php
    if(5>3){
        echo "A true statement"; // only executed if the condition is true
    }
?>

<h3>IF/Then/Else Statement</h3>
<?php
    if(5>9){
        echo "A true statement"; // only executed if the condition is true
    }
    else{
        echo "NOT a true statement";
    }
?>

<h3>Multiple Conditions</h3>
<?php
    // can also use || for OR
    if((5>2) && (3<6)){
        echo "TRUE";
    }
    else{
        echo "FALSE";
    }
?>

<h3>Switch Statement</h3>
<?php

    $x = 6;

    switch($x){
        case 1:
            echo "One";
            break;
        case 2:
            echo "Two";
            break;
        case 3:
            echo "Three";
            break;
        case 4:
            echo "Four";
            break;
        default:
            echo "We don't know what it is";
            break;
    }
   
?>

</body>
</html>