<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Arrays -Numeric &amp; Associative </title>
</head>

<body>
<?php


echo "<h2>Numeric Arrays</h2>";
$arrFruit = array();// declare an array; can be populated later.
array_push($arrFruit , "apple", "raspberry", "orange"); // populate array with values
//echo $arrFruit; // will NOT work; we need to use "print_r" to echo out all values.
echo "<pre>";
print_r ($arrFruit); // note the output: the => character is the "pointer" (also goes by other names). 
echo "</pre>"; // to clean up the output, we can wrap it in <pre> (preformatted text).
// note that an Indexed Array starts at zero, not one. 0 is the first item.

// to access a single value stored in an array, we need to knows its index.
echo "The second item is ". $arrFruit[1]; // note that we CAN use echo for a single value.

echo "<p>We can also declare and populate an array at the same time.</p>";
$myarray = array("one","two","three","four");
print_r ($myarray);

echo "<h2>Associative Arrays</h2>";

$salaries["Clarence"] = 5000;
$salaries["Bobby-Sue"] = 4000;
$salaries["Biffy"] = 2500;
$salaries["Skippy"] = 0;

echo "Bobby-Sue's salary is " . $salaries["Bobby-Sue"];

echo "<h2>Associative Arrays -  Another Way of Writing</h2>";


$salaries =  array("Clarence" => 5000, "Bobby-Sue" => 4000, "Biffy" => 2500,"Skippy" => 0); 
echo "Biffy's salary is " . $salaries["Biffy"];

echo "<h2>Seeing Other Ways PHP Uses Arrays - \$_SERVER</h2>";
echo "<pre>";
//print_r($_SERVER); // Do NOT show this on screen. It WILL display your htaccess password.
echo "</pre>";
// could also use this for $_FILES, $_GET, $_POST, etc. They are all arrays.


echo "<h2>Looping Through Arrays</h2>";

foreach ($_SERVER as $k => $v) {
	if ($k != "PHP_AUTH_PW"){// may show htaccess password; seems to be removed in PHP 7 :)
  echo "$k: $v \n<br />";
	}
}

echo "<h2>Other Array Functions</h2>";

  $colorArray = array("Red", "Yellow", "Green", "Blue", "Indigo");
	// these functions move the pointer around within the array
      echo 'The last element is ' . end($colorArray) . '<br>';
      echo 'The previous element is ' .  prev($colorArray) . '<br>';
      echo 'The first element is ' . reset($colorArray) . '<br>';
      echo 'The next element is ' . next($colorArray) . '<br>';

?>


</body>
</html>