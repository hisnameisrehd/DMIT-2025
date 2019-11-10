<?php

include("includes/header.php");

?>

<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?></h1>

</div>

<?php
$result = mysqli_query($con, "SELECT * FROM image_gallery");
?>

<?php while ($row = mysqli_fetch_array($result)) : ?>
  <div class="thumb">
    <div class="image">
      <a href="detail.php?id=<?php echo $row['id']; ?>">
        <img src="images/squares/<?php echo $row['npe_file']; ?>" alt="thumbnail" />
      </a>
    </div>
  </div>
<?php endwhile; ?>




<?php

include("includes/footer.php");
?>