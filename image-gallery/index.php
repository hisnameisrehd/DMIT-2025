<?php

include("includes/header.php");
//////////// pagination
$getcount = mysqli_query($con, "SELECT COUNT(*) FROM image_gallery");
$postnum = mysqli_result($getcount, 0); // this needs a fix for MySQLi upgrade; see custom function below
$limit = 10;
if ($postnum > $limit) {
  $tagend = round($postnum % $limit, 0);
  $splits = round(($postnum - $tagend) / $limit, 0);

  if ($tagend == 0) {
    $num_pages = $splits;
  } else {
    $num_pages = $splits + 1;
  }

  if (isset($_GET['pg'])) {
    $pg = $_GET['pg'];
  } else {
    $pg = 1;
  }
  $startpos = ($pg * $limit) - $limit;
  $limstring = "LIMIT $startpos,$limit";
} else {
  $limstring = "LIMIT 0,$limit";
}

// MySQLi upgrade: we need this for mysql_result() equivalent
function mysqli_result($res, $row, $field = 0)
{
  $res->data_seek($row);
  $datarow = $res->fetch_array();
  return $datarow[$field];
}
//////////////
?>

<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?></h1>

</div>

<?php
$result = mysqli_query($con, "SELECT * FROM image_gallery ORDER BY id ASC $limstring");
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
<div class="row custom-pagination gallery-card-container pb-1">
  <div class="col-12">
    <?php include('includes/pagination.php'); ?>
  </div>
</div>
<div class="row d-flex gallery-card-container justify-content-center">
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