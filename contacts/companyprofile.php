<?php
session_start();

include("includes/header.php");

$id = $_GET['id'];
?>


<?php
$result = mysqli_query($con, "SELECT * FROM npe_contacts WHERE cid = $id");
?>

<?php while ($row = mysqli_fetch_array($result)) : ?>
  <!-- Go ahead and do some HTML/CSS styling in here...I dare you! -->
  <div class="jumbotron clearfix">
    <h1><?php echo $row['npe_business_name']; ?></h1>
  </div>

  <?php if ($row['npe_person_name'] != "") : ?>
    <br />
    <b class="info-box-title">CEO: </b>
    <div class="info-box-border">
      <h3><?php echo $row['npe_person_name']; ?></h3>
    </div>
  <?php endif; ?>




  <div class="row">
    <!-- left -->
    <div class="col-4">
      <?php if ($row['npe_address1'] != "") : ?>
        <br />
        <b>Address: </b><?php echo $row['npe_address1']; ?>
      <?php endif; ?>
      <?php if ($row['npe_postal'] != "") : ?>
        <br />
        <b>Postal/Zip: </b><?php echo $row['npe_postal']; ?>
      <?php endif; ?>
      <?php if ($row['npe_city'] != "") : ?>
        <br />
        <b>City: </b><?php echo $row['npe_city']; ?>
      <?php endif; ?>
      <?php if ($row['npe_province'] != "") : ?>
        <br />
        <b>Province: </b><?php echo $row['npe_province']; ?>
      <?php endif; ?>
    </div>
    <!-- mid -->
    <div class="col-4">
      <?php if ($row['npe_email'] != "") : ?>
        <br />
        <b>Email: </b><a href="mailto:<?php echo $row['npe_email']; ?>"><?php echo $row['npe_email']; ?></a>
      <?php endif; ?>
      <?php if ($row['npe_phone'] != "") : ?>
        <br />
        <b>Phone: </b><?php echo $row['npe_phone']; ?>
      <?php endif; ?>
      <?php if ($row['npe_url'] != "") : ?>
        <br />
        <br />
        <b>Website: </b><a href="<?php echo $row['npe_url']; ?>" target="_blank"><?php echo $row['npe_url']; ?></a>
      <?php endif; ?>
    </div>
    <!-- right -->
    <div class="col-4">
      <?php if ($row['npe_resume'] == 0) : ?>
        <br />
        <br />
        <br />
        <br />
        <b class="ml-3 p-1 btn-danger">Résumé Not Sent</b>
      <?php elseif ($row['npe_resume'] == 1) : ?>
        <br />
        <br />
        <br />
        <br />
        <b class="ml-3 p-1 btn-success">Résumé Submitted</b>
      <?php endif; ?>
    </div>
    <!-- bottom row -->
    <div class="col-12">

      <?php if ($row['npe_description'] != "") : ?>
        <br />
        <hr />
        <b>Description:</b>
        <br />
        <p style="font-size:1.1rem;" class="pl-1 ml-2 mr-2"><?php echo $row['npe_description']; ?></p>
      <?php endif; ?>
    </div>
  </div>


<?php endwhile; ?>

<?php
include("includes/footer.php");
?>