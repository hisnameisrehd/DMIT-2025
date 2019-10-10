<?php
session_start();

include ("includes/header.php");

?>

  <h1>List Characters</h1>
<?php 
 // Reading from a DB: SELECT

 $result = mysqli_query($con, "SELECT * FROM characters") or die(mysqli_error($con));

 // loop trhough results
if($result)
{
    echo "<div class=\"row\">" ;
    echo "<div class=\"col-1\"><strong>ID</strong></div>" ;
    echo "<div class=\"col-3\"><strong>First Name</strong></div>" ;
    echo "<div class=\"col-3\"><strong>Last Name</strong></div>" ;
    echo "<div class=\"col-5\"><strong>Description</strong></div>" ;
    echo "</div>" ;
    while($row = mysqli_fetch_array($result)) {
        echo "\n<hr>";
        echo "<div class=\"row\">" ;
        echo "<div class=\"col-1\">" . $row['id'] . "</div>" ;
        echo "<div class=\"col-3\">" . $row['first_name'] . "</div>" ;
        echo "<div class=\"col-3\">" . $row['last_name'] . "</div>" ;
        echo "<div class=\"col-5\">" . $row['description'] . "</div>" ;
        echo "</div>" ;
    }
}

?> 

<?php

include ("includes/footer.php");
?>