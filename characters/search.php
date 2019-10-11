<?php
session_start();

include("includes/header.php");

if (isset($_POST['submit'])) {
  $searchterm = trim($_POST['searchterm']);
  $valid = 1;

  if (trim($searchterm) == "") {
    $valid = 0;
    $emptyMsg = "<div class=\"alert alert-danger\" role=\"alert\">What The Shell! Provide Search Terms!</div>";
  }
}
?>

<h1>Search</h1>
<!-- Search form -->
<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  <div class="form-group">
    <label for="searchterm">Search:</label>
    <input class="form-control" type="text" name="searchterm" value="<?php if (trim($searchterm) != "") {
                                                                        echo $searchterm;
                                                                      } ?>">
    <?php
    if (trim($emptyMsg) != "" && $valid == 0) {
      echo $emptyMsg;
    }
    ?>
  </div>
  <div class="form-group">
    <label for="submit">&nbsp;</label>
    <input type="submit" name="submit" class="btn btn-info" value="Submit">
  </div>
</form>


<?php

if (isset($_POST['submit'])) {
  $searchterm = trim($_POST['searchterm']);
  if ($searchterm != "") {

    $sql = "SELECT * FROM characters WHERE
    first_name LIKE '$searchterm'
    OR last_name LIKE '$searchterm'
    OR description LIKE '%$searchterm%'";

    $result = mysqli_query($con, $sql) or die(mysqli_error($con));

    if (mysqli_num_rows($result) > 0) {
      echo "<div class=\"alert alert-success\" role=\"alert\">It's Ninja Time! Showing results for $searchterm</div>";

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
    } else {
      echo "<div class=\"alert alert-danger\" role=\"alert\">Holy Chalupa! No Results!</div>";
    }
  }
}
// echo $searchterm; // testing
include("includes/footer.php");
?>