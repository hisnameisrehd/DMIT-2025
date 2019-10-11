<?php
session_start();

include("includes/header.php");

?>

<h1><?php echo APP_NAME ?></h1>
<div class="row">
  <div class="col-sm-5" style="color:white; font-size:1.1rem;"><br />
    <p>The Teenage Mutant Ninja Turtles (often shortened to TMNT or Ninja Turtles) are four fictional teenaged anthropomorphic turtles named after Italian Renaissance artists. They were trained by their anthropomorphic rat sensei in the art of ninjutsu. From their home in the sewers of New York City, they battle petty criminals, evil overlords, mutated creatures, and alien invaders while attempting to remain hidden from society. They were created by Kevin Eastman and Peter Laird.</p>

    <p>The characters originated in comic books published by Mirage Studios and expanded into cartoon series, films, video games, toys, and other merchandise.[2] During the peak of the franchise's popularity in the late 1980s and early 1990s, it gained worldwide success and fame.</p>
  </div>
  <div class="col-sm-7">
    <h5 style="font-size:1.2rem;padding-left:5rem;text-shadow: 2px 2px #ffffff;padding-top:1.2rem;">Discover More About Your Favorite Characters</h5>
    <?php
    // Reading from a DB: SELECT

    $result = mysqli_query($con, "SELECT * FROM characters ORDER BY rand() LIMIT 1") or die(mysqli_error($con));

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
    ?>
  </div>
</div>

<?php

include("includes/footer.php");
?>