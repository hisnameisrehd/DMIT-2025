<!DOCTYPE html>

<html>
<head>
<title>CD Collection</title>
<style type="text/css">
body {
	font-family: verdana, arial;
	font-size: 90%;
}
.thisCD {
	border: 1px solid #999;
	padding: 10px;
	margin-top:10px;
	/*
	height: 150px;*/
	width: 400px;
	
}
.displayCategory {

	font-weight: bold;
	color: #009;
}
.displayInfo{

	font-weight: normal;
	color: #900;
}
.cdImage {
	float: right;
}
.displayDescription {
	font-size: 85%;
	padding: 7px;
}
.clearFix {
	clear: both;
}
#main{
	width: 500px;
	float:left;
}
#rightcol{
	float:left;
	top: 0px;
	border: 1px solid #900;	
	width: 400px;
	padding: 7px;
}
</style>

</head>
<body>

<div id="main">
<?php

$id = $_GET['cd_id'];
?>

<?php
require("mysql_connect.php");

$result = mysqli_query($con, "SELECT * FROM cd_catalog_class WHERE cd_id = $id");
?>

<?php while ($row = mysqli_fetch_array($result)) : ?>
    <!-- Go ahead and do some HTML/CSS styling in here...I dare you! -->
    <div class="row">
        <div class="col-xl-9">
            <?php if ($row['artwork'] != "") : ?>
                <img src="artwork/thumbs150/<?php echo $row['artwork']; ?>" alt="">
            <?php endif; ?>
        </div>

        <div class="col-xl-3">
            <div class="row info">
                <div class="col-12">
                <?php if ($row['artist'] != "") : ?>
                    <h1><?php echo $row['artist']; ?></h1>
                <?php endif; ?>
                <?php if ($row['title'] != "") : ?>
                    <h1><?php echo $row['title']; ?></h1>
                <?php endif; ?>
                <?php if ($row['description'] != "") : ?>
                    <p><?php echo $row['description']; ?></p>
                <?php endif; ?>
            </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>




</div>

</body>
</html>

