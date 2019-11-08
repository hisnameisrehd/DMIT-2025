<?php
session_start();

include("includes/header.php");
?>

<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?></h1>
</div>

<?php
$result = mysqli_query($con, "SELECT * FROM image_gallery");
?>


<!-- https://www.sitepoint.com/community/t/scraping-images-from-a-website/3468/4 -->


<?php while ($row = mysqli_fetch_array($result)) : ?>
  <div>
    <a href="gallery.php?id=<?php echo $row['id']; ?>">IMAGE FILE</a>
  </div>
<?php endwhile; ?>
<!-- end mysqli_fetch_array() -->

<?php
include("includes/footer.php");
?>