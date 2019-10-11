<?php

include("includes/header.php");

$id = $_GET['id'];

?>

<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?></h1>

</div>

<?php
$result = mysqli_query($con, "SELECT * FROM npe_contacts WHERE cid = $id");
?>

<?php while($row = mysqli_fetch_array($result)): ?>
	<!-- Go ahead and do some HTML/CSS styling in here...I dare you! -->
<h2><?php echo $row['npe_business_name']; ?></h2>


<?php if ($row['npe_person_name'] != ""): ?>
<!-- Write what you want in HTML here: No PHP echo needed. -->
  <b>Person Name: </b><?php echo $row['npe_person_name'];?>


<?php endif; ?>


<?php endwhile; ?>



<?php

include("includes/footer.php");
?>