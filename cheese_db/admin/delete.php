<?php
    include("../mysql_connect.php");// here we include the connection script; since this file(header.php) is included at the top of every page we make, the connection will then also be included. Also, config options like BASE_URL are also available to us.

    $cid = $_GET['id']; // page-setter variable

    if(!is_numeric($cid)) {
        header("Location: edit.php");
    } else {
        // echo $image_id;
    
        // Removing data in a DB: DELETE
    
        mysqli_query($con, "DELETE FROM cheese_db
        WHERE cid=$cid") or die(mysqli_error($con));
    
        header("Location: edit.php");
    }
?>