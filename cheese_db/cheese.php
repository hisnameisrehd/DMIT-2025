<?php
include("header.php");
?>



<div id="results">

<h2>Filtered MySQL Query Results</h2>
<?php


$cid = $_GET['cid'];


// HERE IS THE DEFAULT QUERY: IF NO IF/THENS BELOW ARE TRUE THEN THIS QUERY WILL STAND; OTHERWISE, IT WILL BE OVERWRITTEN
$result = mysqli_query($con,"SELECT * FROM cheese_db WHERE cid = '$cid'");// SHOW EVERYTHING


	// HANDLING NO RESULTS FROM A QUERY
 if(mysqli_num_rows($result)==0){
    echo "<h1>Nothing to Show</h1>";
  }
   
while ($row = mysqli_fetch_array( $result )){

	$cheese = $row['cheese'];
	 echo "<h2>$cheese</h2>";
	$image_file = $row['image_file'];
		echo "<img src=\"images/display/$image_file\" /><br />";
  
	 
	  echo "<b>Milk:</b> ". $row['type']. "<br />";
	  echo "<b>Country:</b> ". $row['country']. "<br />";
	  echo "<b>Classification:</b> ". $row['classification']. "<br />";
	  if($row['age'] != 0){
		  echo "<b>Age:</b> ". $row['age']. " weeks<br />";
	  }
	  echo "<b>Description:</b> ". $row['description']. "<br />";
	  $returnToLastQuery = "<p><b><a href=\"". $_SERVER['HTTP_REFERER']. "\">Back</a></b></p>";
	  echo $returnToLastQuery;
	  // IF A USER DECIDES TO VIEW THIS ONE ITEM IN FULL DETAIL, PERHAPS WE COULD CONSIDER THIS AS "POPULAR" AND START RECORDING "HITS"
	 mysqli_query ($con, "UPDATE cheese_db SET viewed = viewed +1 WHERE cid = '$cid'") or die (mysqli_error($con));


}

?>

<?php
include("footer.php");
?>

