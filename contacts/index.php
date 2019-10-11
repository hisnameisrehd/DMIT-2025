<?php

include("includes/header.php");

?>

<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?></h1>

</div>

<?php
$result = mysqli_query($con, "SELECT * FROM npe_contacts");
?>

<?php while($row = mysqli_fetch_array($result)): ?>
	<!-- Go ahead and do some HTML/CSS styling in here...I dare you! -->
<hr>
<a href="companyprofile.php?id=<?php echo $row['cid'];?>"><?php echo $row['npe_business_name'];?></a>

<?php endwhile; ?>



<?php

include("includes/footer.php");
?>