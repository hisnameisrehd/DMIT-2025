<?php
session_start();

include("includes/header.php");
include("includes/_functions.php");

//////////// pagination
$getcount = mysqli_query($con, "SELECT COUNT(*) FROM npe_blog");
$postnum = mysqli_result($getcount, 0); // this needs a fix for MySQLi upgrade; see custom function below
$limit = 5;
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
$result = mysqli_query($con, "SELECT * FROM npe_blog ORDER BY bid DESC $limstring");
?>

<ul class="blogposts constrain-content">
  <?php while ($row = mysqli_fetch_array($result)) : ?>
    <?php
      // echo $row['npe_timedate'];
      $myDay = strtotime($row['npe_timedate']);
      $day = date('d', $myDay);
      $myYear = strtotime($row['npe_timedate']);
      $year = date('Y', $myYear);
      $myMonth = strtotime($row['npe_timedate']);
      $month = date('M', $myMonth);
      // echo "$day, $month, $year";
      ?>
    <li class="blogpost">
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-2 pt-3 date-div">
              <p>
                <div class="fancy-date">
                  <span class="day"><?php echo $day; ?></span>
                  <span class="month"><?php echo $month; ?></span>
                  <span class="year"><?php echo $year; ?></span>
                </div>
              </p>
            </div>
            <div class="col-10 message-box">
              <h3>
                <h4><?php echo $row['cid']; ?><?php echo $row['npe_title']; ?></h4>
              </h3>
              <p><?php echo nl2br(makeClickableLinks(addEmoticons($row['npe_message']))); ?></p>
            </div>
          </div>
        </div>
      </div>
      <span class="d-block" style="text-align:right;font-size:.7rem;"><?php echo $row['npe_timedate']; ?></span>
    </li>
  <?php endwhile; ?>
  <!-- end mysqli_fetch_array() -->

</ul>
</div>
</main>

<div class="row custom-pagination pt-3 mt-5">
  <div class="col-12">
    <?php include('includes/pagination.php'); ?>
  </div>
</div>

<?php
include("includes/footer.php");
?>