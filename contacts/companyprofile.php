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

<?php while ($row = mysqli_fetch_array($result)) : ?>
  <!-- Go ahead and do some HTML/CSS styling in here...I dare you! -->
  <h2><?php echo $row['npe_business_name']; ?></h2>

  <?php if ($row['npe_person_name'] != "") : ?>
    <hr />
    <b>Person Name: </b><?php echo $row['npe_person_name']; ?>
  <?php endif; ?>
  <?php if ($row['npe_email'] != "") : ?>
    <hr />
    <b>Email: </b><?php echo $row['npe_email']; ?>
  <?php endif; ?>
  <?php if ($row['npe_url'] != "") : ?>
    <hr />
    <b>Website: </b><?php echo $row['npe_url']; ?>
  <?php endif; ?>
  <?php if ($row['npe_phone'] != "") : ?>
    <hr />
    <b>Phone: </b><?php echo $row['npe_phone']; ?>
  <?php endif; ?>
  <?php if ($row['npe_address1'] != "") : ?>
    <hr />
    <b>Address: </b><?php echo $row['npe_address1']; ?>
  <?php endif; ?>
  <?php if ($row['npe_postal'] != "") : ?>
    <hr />
    <b>Postal/Zip: </b><?php echo $row['npe_postal']; ?>
  <?php endif; ?>
  <?php if ($row['npe_city'] != "") : ?>
    <hr />
    <b>City: </b><?php echo $row['npe_city']; ?>
  <?php endif; ?>
  <?php if ($row['npe_province'] != "") : ?>
    <hr />
    <b>Province: </b><?php echo $row['npe_province']; ?>
  <?php endif; ?>
  <?php if ($row['npe_resume'] == 0) : ?>
    <hr />
    <b>Résumé: </b><?php echo "Not Submitted"; ?>
  <?php elseif ($row['npe_resume'] == 1) : ?>
    <hr />
    <b>Résumé: </b><?php echo "Submitted"; ?>
  <?php endif; ?>
  <?php if ($row['npe_description'] != "") : ?>
    <hr />
    <b>Description: </b><?php echo $row['npe_description']; ?>
  <?php endif; ?>

<?php endwhile; ?>

<?php
include("includes/footer.php");
?>