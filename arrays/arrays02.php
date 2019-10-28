<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Arrays -  Multidimensional</title>
</head>

<body>
<?php
echo "<h1>Multidimensional Arrays</h1>";
	
$employees["employee 1"]["name"] = "Dana";
$employees["employee 1"]["title"] = "Owner";
$employees["employee 1"]["salary"] = "$60,000";

$employees["employee 2"]["name"] = "Matt";
$employees["employee 2"]["title"] = "Manager";
$employees["employee 2"]["salary"] = "$40,000";

$employees["employee 3"]["name"] = "Susan";
$employees["employee 3"]["title"] = "Cashier";
$employees["employee 3"]["salary"] = "$30,000";

echo "<h3>Multidimensional Arrays - Accessing the Top Level</h3>";
echo $employees["employee 2"]["name"].
	" is the ".$employees["employee 2"]["title"].
	" and he earns ".$employees["employee 2"]["salary"].
	" a year.";
	
	echo "<p>";
	echo "<pre>";
	print_r ($employees["employee 2"]); // accessing 1st level
	echo "</pre>";
echo "<h3>Multidimensional Arrays - Accessing all Levels Through Looping</h3>";
	foreach ($employees as $k => $v) {
		
		  foreach ($v as $k2 => $v2) {
			 if($k2 == "name"){// just get the names
			  echo "$k - $k2: $v2 \n<br />";
		  }
		}
	}
	
	
	
echo "<h2>Multidimensional Arrays -  Another Syntax</h2>";	
	
$employees = array
(
 "employee 1" => array
 (
  "name" => "Dana",
  "title" => "Owner",
  "salary" => "$60,000",
 ),
 
 "employee 2" => array
 (
  "name" => "Matt",
  "title" => "Manager",
  "salary" => "$40,000",
 ),

 "employee 3" => array
 (
  "name" => "Susan",
  "title" => "Cashier",
  "salary" => "$30,000",
 )
);

echo $employees["employee 1"]["name"].
	" is the ".$employees["employee 1"]["title"].
	" and they earn ".$employees["employee 1"]["salary"].
	" a year.";
	
	
	
?>








</body>
</html>