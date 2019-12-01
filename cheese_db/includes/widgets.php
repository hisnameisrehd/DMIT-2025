

<?php
// all these will be completed in class


///////////////////////////////////////// RANDOM
echo "<h3>Random Cheese</h3>";

$randomCheese = mysqli_query($con, "SELECT * FROM cheese_db ORDER BY RAND() LIMIT 1");
while ($row = mysqli_fetch_array($randomCheese)) {
    $cheese = $row['cheese'];
    $cid = $row['cid'];
    $imageFile = $row['image_file'];
    echo "<a href=\"" . BASE_URL . "cheese.php?cid=$cid\"><img src=\"" . BASE_URL . "images/thumbs100/$imageFile\"><br/>$cheese</a>" . "<br />";
}

// echo "<h3>Random Cheese from Blue Cheese</h3>";

// $randomCheese = mysqli_query($con, "SELECT * FROM cheese_db WHERE classification LIKE 'blue' ORDER BY RAND() LIMIT 1");
// while($row = mysqli_fetch_array($randomCheese)){
//     $cheese = $row['cheese'];
//     $cid = $row['cid'];
//     $imageFile = $row['image_file'];
//     echo "<a href=\"cheese.php?cid=$cid\"><img src=\"images/thumbs100/$imageFile\"><br/>$cheese</a>" . "<br />";
// }

///////////////////////////////////////


echo "<h3>Milk Types</h3>";

$popularCD = mysqli_query($con, "SELECT * FROM cheese_db GROUP BY type ORDER BY Count(*) DESC LIMIT 5");
while ($row = mysqli_fetch_array($popularCD)) {
    $type = $row['type'];
    $cid = $row['cid'];
    echo "<a href=\"" . BASE_URL . "index.php?displayby=type&displayvalue=$type\">$type</a>" . "<br />";
}


///////////////////////////////////////// POPULAR DOGS
echo "<h3>Most Viewed Cheese</h3>";

//// there is an UPDATE query in index.php that sets this column value, and we just ORDER BY popularity DESC here to get most popular views
$randomCheese = mysqli_query($con, "SELECT * FROM cheese_db ORDER BY viewed DESC LIMIT 1");
while ($row = mysqli_fetch_array($randomCheese)) {
    $cheese = $row['cheese'];
    $cid = $row['cid'];
    $imageFile = $row['image_file'];
    echo "<a href=\"" . BASE_URL . "cheese.php?cid=$cid\"><img src=\"" . BASE_URL . "images/thumbs100/$imageFile\"><br/>$cheese</a>" . "<br />";
}
///////////////////////////////////////

//////////////////////////////////////// ALPHABETICAL LIST WITH HEADINGS
// from http://www.webhostingtalk.com/showthread.php?t=717692
// user "bigfan"

// echo "<h3>Alphabetical List</h3>";

/*Mysql Left Function is used to return the leftmost string character from the string.
Column Alias: 
http://www.geeksengine.com/database/basic-select/column-alias.php

*/

///////////////////////////////////////////

////////////////////////////////////////// ALPHABETICAL A - Z LINKS
echo "<h3>Alphabetical A - Z Links only</h3>";

$qry = "SELECT *, LEFT(cheese, 1) AS first_char FROM cheese_db 
        WHERE UPPER(cheese) BETWEEN 'A' AND 'Z'
        ORDER BY cheese";

$result = mysqli_query($con, $qry);
$current_char = '';
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['first_char'] != $current_char) {
        $current_char = $row['first_char'];
        $thisChar = strtoupper($current_char);
        echo "<a href=\"" . BASE_URL . "index.php?displayby=cheese&displayvalue=$thisChar%\">$thisChar</a> | ";
    }
}

?>

