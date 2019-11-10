<?php
session_start();

include("includes/header.php");

$id = $_GET['id'];
?>


<?php
$result = mysqli_query($con, "SELECT * FROM image_gallery WHERE id = $id");
?>

<?php while ($row = mysqli_fetch_array($result)) : ?>
  <!-- Go ahead and do some HTML/CSS styling in here...I dare you! -->
  <div class="jumbotron clearfix">
    <h1><?php echo $row['npe_business_name']; ?></h1>
  </div>

  <?php if ($row['npe_title'] != "") : ?>
      <h3><?php echo $row['npe_title']; ?></h3>
  <?php endif; ?>
  
  <?php if ($row['npe_file'] != "") : ?>
      <img src="images/display/<?php echo $row['npe_file']; ?>" alt="">
  <?php endif; ?>
  
  <?php if ($row['npe_description'] != "") : ?>
      <h3><?php echo $row['npe_description']; ?></h3>
  <?php endif; ?>

<?php endwhile; ?>

<?php
include("includes/footer.php");
?>