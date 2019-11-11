<?php

include("includes/header.php");

?>

<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?></h1>

</div>

<?php
$result = mysqli_query($con, "SELECT * FROM image_gallery");
?>

<style>
  .gallery-card-container {
    margin: 0 auto;
    max-width: 960px;
    padding-left: 1.1rem;
  }

  .gallery-card {
    padding-top: .7rem;
    height: 240px;
    background: black;
    border: 2px solid black;
    border-radius: 6px;
    margin-right: 1.1rem;
    margin-bottom: 1rem;
  }

  .gallery-card-image {
    padding-top: .7rem;
    padding-left: .5rem;
    padding-right: .5rem;
    background: white;
    height: 95%;
  }
</style>

<div class="row d-flex gallery-card-container">
  <?php while ($row = mysqli_fetch_array($result)) : ?>
    <a href="gallery.php?id=<?php echo $row['id']; ?>">
    <div class="gallery-card">
      <div class="gallery-card-image">
          <img src="images/squares/<?php echo $row['npe_file']; ?>" alt="thumbnail" />
        </div>
      </div>
    </a>
  <?php endwhile; ?>
</div>



<?php

include("includes/footer.php");
?>