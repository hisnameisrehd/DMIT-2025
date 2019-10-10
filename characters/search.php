<?php
session_start();

include ("includes/header.php");



?>

  <h1>Search</h1>
<!-- Search form -->
<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  <div class="form-group">
    <label for="searchterm">Search:</label>
    <input class="form-control" type="text" name="searchterm" >
  </div>
    <div class="form-group">
        <label for="submit">&nbsp;</label>
        <input type="submit" name="submit" class="btn btn-info" value="Submit">
    </div>
</form> 


<?php

if(isset($_POST['submit'])) {
  $searchterm = trim($_POST['searchterm']);
  if($searchterm != "") {

    $sql = "SELECT * FROM characters WHERE
    first_name LIKE '$searchterm'
    OR last_name LIKE '$searchterm'
    OR description LIKE '%$searchterm%'";
    
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    
    if(mysqli_num_rows($result) > 0) {
    //  echo "yes";
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
    } else {
      echo "<div class=\"alert alert-danger\" role=\"alert\">No Results</div>";
    }
  } else {
    echo "<div class=\"alert alert-danger\" role=\"alert\">You must provide search terms.</div>";
		}
  }
  // echo $searchterm; // testing
include ("includes/footer.php");
?>