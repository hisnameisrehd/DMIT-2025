<?php

/*Note: Feel free to use this with any data set you like. */

$con = mysqli_connect("localhost", "username","password","db_name");

?>
<!DOCTYPE html>
<html>
<head>
	<title>	PHP Alternative Syntax</title>
	<style type="text/css">
			body{
				font-family:arial;
			}
	</style>
</head>
<body>



<h3>Example IF Statement</h3>
<p>
<?php if (date("d") % 2 == 0): ?>

<!-- Write what you want in HTML here: No PHP echo needed. -->

<b>Today is an even day</b>

<?php else:?>

<em>Today is an odd day....very odd indeed!</em>


<?php endif; ?>
</p>



<h3>Example While Loop</h3>
<?php
$result = mysqli_query($con, "SELECT * FROM cd_catalog_class LIMIT 5");
?>

<?php while($row = mysqli_fetch_array($result)): ?>
	<!-- Go ahead and do some HTML/CSS styling in here...I dare you! -->
<hr>
Artist Name: <?php echo $row['artist'];?><br>
CD Title: <?php echo $row['title'];?><br>

<?php endwhile; ?>

</body>
</html>