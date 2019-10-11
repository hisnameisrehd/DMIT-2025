<?php
session_start();

include("includes/header.php");

?>

<h1>List Characters</h1>
<?php
// Reading from a DB: SELECT

$result = mysqli_query($con, "SELECT * FROM characters") or die(mysqli_error($con));

// loop trhough results
if ($result) {
  while ($row = mysqli_fetch_array($result)) {
    echo "<div class=\"char-card\">";
    echo "<div class=\"card-body\">";
    echo "<h3 class=\"card-title\">" . $row['first_name'] . "</h3>";
    echo "<p class=\"card-text\">" . $row['description'] . "</p>";
    echo "<hr />";
    if (strtolower($row['first_name']) == 'shredder' || strtolower($row['first_name']) == 'krang') {
      echo "<span class=\"type-style-evil mr-1\">Evil</span>";
    }
    if (strtolower($row['last_name']) == 'turtle' || strtolower($row['last_name']) == 'rat' || strtolower($row['first_name']) == 'shredder') {
      echo "<span class=\"type-style-ninja mr-1\">Ninja</span>";
    }
    if (strtolower($row['last_name']) != 'turtle' && strtolower($row['last_name']) != 'rat' && strtolower($row['last_name']) != 'human') {
      echo "<span class=\"type-style-unknown\">" . $row['last_name'] . "</span>";
    } else {
      if (strtolower($row['last_name']) == 'turtle') {
        echo "<span class=\"type-style-turtle\">" . $row['last_name'] . "</span>";
      } else {
        if (strtolower($row['last_name']) == 'rat') {
          echo "<span class=\"type-style-rat\">" . $row['last_name'] . "</span>";
        } else {
          if (strtolower($row['last_name']) == 'human') {
            echo "<span class=\"type-style-human\">" . $row['last_name'] . "</span>";
          }
        }
      }
    }
    echo "</div>";
    echo "</div>";
  }
}
// if($result)
// {
//     echo "<div class=\"row\">" ;
//     echo "<div class=\"col-1\"><strong>ID</strong></div>" ;
//     echo "<div class=\"col-3\"><strong>First Name</strong></div>" ;
//     echo "<div class=\"col-3\"><strong>Last Name</strong></div>" ;
//     echo "<div class=\"col-5\"><strong>Description</strong></div>" ;
//     echo "</div>" ;
//     while($row = mysqli_fetch_array($result)) {
//         echo "\n<hr>";
//         echo "<div class=\"row\">" ;
//         echo "<div class=\"col-1\">" . $row['id'] . "</div>" ;
//         echo "<div class=\"col-3\">" . $row['first_name'] . "</div>" ;
//         echo "<div class=\"col-3\">" . $row['last_name'] . "</div>" ;
//         echo "<div class=\"col-5\">" . $row['description'] . "</div>" ;
//         echo "</div>" ;
//     }
// }
?>

<?php

include("includes/footer.php");
?>