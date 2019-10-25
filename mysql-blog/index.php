<?php
include("includes/header.php");
include("includes/_functions.php");

//////////// pagination
$getcount = mysqli_query ($con,"SELECT COUNT(*) FROM npe_blog");
$postnum = mysqli_result($getcount,0);// this needs a fix for MySQLi upgrade; see custom function below
$limit = 5;
if($postnum > $limit){
$tagend = round($postnum % $limit,0);
$splits = round(($postnum - $tagend)/$limit,0);

if($tagend == 0){
$num_pages = $splits;
}else{
$num_pages = $splits + 1;
}

if(isset($_GET['pg'])){
$pg = $_GET['pg'];
}else{
$pg = 1;
}
$startpos = ($pg*$limit)-$limit;
$limstring = "LIMIT $startpos,$limit";
}else{
$limstring = "LIMIT 0,$limit";
}

// MySQLi upgrade: we need this for mysql_result() equivalent
function mysqli_result($res, $row, $field=0) { 
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

<ul class="blogposts">
  <?php while ($row = mysqli_fetch_array($result)) : ?>
    <li class="blogpost">
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-9">
              <h3>
                <h4><?php echo $row['cid']; ?><?php echo $row['npe_title']; ?></h4>
              </h3>
              <p><?php echo nl2br(makeClickableLinks(addEmoticons($row['npe_message']))); ?></p>
            </div>
            <div class="col-3 pt-3">
              <p>
                <?php
                  // echo $row['npe_timedate'];
                  $myDay = strtotime($row['npe_timedate']);
                  $day = date('d', $myDay);
                  $myYear = strtotime($row['npe_timedate']);
                  $year = date('Y', $myYear);
                  $myMonth = strtotime($row['npe_timedate']);
                  $month = date('M', $myMonth);
                  echo "$day, $month, $year";
                  ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </li>
  <?php endwhile; ?>
  <!-- end mysqli_fetch_array() -->
</ul>

<?php
///////////////// pagination links: perhaps put these BELOW where your results are echo'd out.
if($postnum > $limit){
  echo "<strong>Pages:</strong> &nbsp;&nbsp;&nbsp;";
  $n = $pg + 1;
  $p = $pg - 1;
  $thisroot = $_SERVER['PHP_SELF'];
  if($pg > 1){
  echo "<a href=\"$thisroot?pg=$p\"><< prev</a>&nbsp;&nbsp;";
  }
  for($i=1; $i<=$num_pages; $i++){
  if($i!= $pg){
  echo "<a href=\"$thisroot?pg=$i\">$i</a>&nbsp;&nbsp;";
  }else{
  echo "$i&nbsp;&nbsp;";
  }
  }
  if($pg < $num_pages){
  echo "<a href=\"$thisroot?pg=$n\">next >></a>";
  }
  echo "&nbsp;&nbsp;";
  }
  ////////////// end pagination
?>

<?php
include("includes/footer.php");
?>