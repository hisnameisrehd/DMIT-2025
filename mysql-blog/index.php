<?php

include("includes/header.php");

?>

<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?></h1>
</div>


<?php
$result = mysqli_query($con, "SELECT * FROM npe_blog ORDER BY bid DESC");
?>

<ul>
  <?php while ($row = mysqli_fetch_array($result)) : ?>
    <li>
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-9">
              <h3>
                <h4><?php echo $row['cid']; ?><?php echo $row['npe_title']; ?></h4>
              </h3>
              <p><?php echo $row['npe_message']; ?></p>
            </div>
            <div class="col-3 pt-3">
              <p><?php echo $row['npe_timedate'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </li>
  <?php endwhile; ?>
  <!-- end mysqli_fetch_array() -->
</ul>
<?php

include("includes/footer.php");
?>