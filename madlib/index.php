<?php
$bname = $_POST['bname'];
$package = $_POST['package'];
$accessory = $_POST['accessory'];
$place = $_POST['place'];
$gname = $_POST['gname'];
$park = $_POST['park'];
$attraction = $_POST['attraction'];
$group = $_POST['group'];
?>
<!DOCTYPE html>
<html>

<head>
  <title>MadLib</title>
  <!-- These must be in place to use Bootstrap ! -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
    html,
    body {
      background: rgb(219, 219, 255);
    }

    .formstyle {
      /* optional: in case you don't like the really wide form */
      max-width: 450px;
    }

    #smaller {
      margin: 0 auto;
      margin-top: 3rem;
      margin-bottom: 3rem;
      width: 70vw;
      padding-top: 2rem;
      padding-bottom: 4rem;
      background: rgb(243, 243, 255);
    }
  </style>
</head>

<body>
  <div id="smaller" class="container">

    <h1>PHP MadLib</h1>

    <form name="myform" class="formstyle" method="post" action="index.php">

      <div class="form-group">
        <label for="bname">A Boy's Name:</label>
        <input type="text" class="form-control" name="bname" value="<?php echo $bname ?>">
      </div>
      <div class="form-group">
        <label for="package">A type of packaging:</label>
        <input type="text" class="form-control" name="package" value="<?php echo $package ?>">
      </div>
      <div class="form-group">
        <label for="accessory">A fashion accessory:</label>
        <input type="text" class="form-control" name="accessory" value="<?php echo $accessory ?>">
      </div>
      <div class="form-group">
        <label for="place">A place:</label>
        <input type="text" class="form-control" name="place" value="<?php echo $place ?>">
      </div>
      <div class="form-group">
        <label for="gname">A girl's name:</label>
        <input type="text" class="form-control" name="gname" value="<?php echo $gname ?>">
      </div>

      <div class="form-group">
        <label for="park">A park:</label>
        <select class="form-control" name="park">
          <option <?php if (isset($park) && $park == "Funville") {
    echo "selected";
} ?> value="Funville">Funville</option>
          <option <?php if (isset($park) && $park == "Galaxyland") {
    echo "selected";
} ?> value="Galaxyland">Galaxyland</option>
          <option <?php if (isset($park) && $park == "Knoebels") {
    echo "selected";
} ?> value="Knoebels">Knoebels</option>
          <option <?php if (isset($park) && $park == "Hershey") {
    echo "selected";
} ?> value="Hershey">Hershey</option>
        </select>
      </div>
      <div class="form-group">
        <label for="attraction">A park attraction:</label><br />
        Tilt-A-Whirl:<input type="radio" value="Tilt-A-Whirl" name="attraction" <?php if (isset($attraction) && $attraction == "Tilt-A-Whirl") {
    echo "checked";
} ?>><br />
        Merry-Go-Round:<input type="radio" value="Roller-Coaster" name="attraction" <?php if (isset($attraction) && $attraction == "Roller-Coaster") {
    echo "checked";
} ?>><br />
        Roller Coaster:<input type="radio" value="Merry-Go-Round" name="attraction" <?php if (isset($attraction) && $attraction == "Merry-Go-Round") {
    echo "checked";
} ?>><br />
        Scrambler:<input type="radio" value="Scrambler" name="attraction" <?php if (isset($attraction) && $attraction == "Scrambler") {
    echo "checked";
} ?>><br />
        Dodgems:<input type="radio" value="Dodgems" name="attraction" <?php if (isset($attraction) && $attraction == "Dodgems") {
    echo "checked";
} ?>><br />
      </div>
      <div class="form-group">
        <label for="group">Group of people:</label>
        <select class="form-control" name="group">
          <option <?php if (isset($group) && $group == "Frank, Jimmy, and Steve") {
    echo "selected";
} ?> value="Frank, Jimmy, and Steve">Frank, Jimmy, and Steve</option>
          <option <?php if (isset($group) && $group == "Sally, Jill, and Jane") {
    echo "selected";
} ?> value="Sally, Jill, and Jane">Sally, Jill, and Jane</option>
          <option <?php if (isset($group) && $group == "Adam, Jack, and Don") {
    echo "selected";
} ?> value="Adam, Jack, and Don">Adam, Jack, and Don</option>
          <option <?php if (isset($group) && $group == "Sam, John, and Kim") {
    echo "selected";
} ?> value="Sam, John, and Kim">Sam, John, and Kim</option>
        </select>
      </div>
      <input type="submit" class="btn btn-primary" name="mysubmit">
    </form>
    <?php
    // did the user click the button ?
    if (isset($_POST['mysubmit'])) {
        if ($bname == "" || $package == "" || $accessory == "" || $place == "" || $gname == "" || $park == "" || $attraction == "" || $group == "") {
            echo "<br /><div class=\"alert alert-danger\">All fields are required to continue.</div>";
        } else {
            echo "<br /><div class=\"alert alert-success\">Success!!!</div>";
            echo "<h3>The Sad Banana</h3><br />";
            // test
            // echo "$bname, $package, $accessory, $place, $gname, $park, $attraction, $group.";
            $story = "<p>Once upon a time there lived a very sad banana named $bname. $bname lived in a $package in Fruitsville. He was sad because he had no friends, but then he thought, \"How am I going to get friends if I don't go looking for some? I am going to go out and look for some friends.\"</p>";
  
            $story .= "\n<p>So $bname put on his $accessory to impress people and went out to $place. He was walking around $place when he met a nice lady banana called $gname. She said, \"Hello, my name is $gname. Do you want to go to $park, and go on the $attraction?\" $bname said, \"OK, If you will be my friend.\" \"Yes!\" She replied. So $bname and $gname became good friends and $bname wasn't sad anymore.</p>";
  
            $story .= "<p>Later on they got married and had 3 little bananas called $group. $bname and $gname told $group stories of how they met at $park. $bname made sure that $group knew the important role in which his $accessory played. He assured them that one day, they too can go on the $attraction. And they all lived happily ever after.</p>";
  
            echo $story;
        }
    } // if submit
    ?>
  </div><!-- / .container -->
</body>

</html>