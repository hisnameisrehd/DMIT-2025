<?php
session_start();

include("includes/header.php");
?>

<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?></h1>
</div>

<?php
$result = mysqli_query($con, "SELECT * FROM npe_contacts");
?>

<?php while ($row = mysqli_fetch_array($result)) : ?>
  <hr>
  <div class="row">
    <div class="col-12">
      <div class="row">
        <div class="col-9">
          <h3>
            <span class="field-content"><a href="companyprofile.php?id=<?php echo $row['cid']; ?>"><?php echo $row['npe_business_name']; ?></a></span>
          </h3>
          <p><?php echo $row['npe_description']; ?></p>
        </div>
        <div class="col-3 pt-3">
          <a href="companyprofile.php?id=<?php echo $row['cid']; ?>">
            Profile Details
          </a>
          <br />
          <a href="<?php echo $row['npe_url']; ?>" target="_blank">
            Visit Website
          </a>
          <?php if ($row['npe_email'] != "") : ?>
            <br />
            <i><a href="mailto:<?php echo $row['npe_email']; ?>">Contact</a></i>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>

<?php
include("includes/footer.php");
?>