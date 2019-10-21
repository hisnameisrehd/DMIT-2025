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


<!-- https://www.sitepoint.com/community/t/scraping-images-from-a-website/3468/4 -->


<ul>
  <?php while ($row = mysqli_fetch_array($result)) : ?>
    <li>
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-9">
              <h3>
                <a href="companyprofile.php?id=<?php echo $row['cid']; ?>"><?php echo $row['npe_business_name']; ?></a>
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
    </li>
  <?php endwhile; ?>
  <!-- end mysqli_fetch_array() -->
</ul>

<?php
include("includes/footer.php");
?>