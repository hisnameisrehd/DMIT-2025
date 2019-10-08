<!--
This file is to be completed by students whjo missed the "calculator" in class project and who need to figure it out for themselves.
Change the file name to "calculator.php", capture the values sent by the form, do the math in the switch statement, show the result to the user, and make a working calculator.

-->

<!DOCTYPE html>
<head>
<title>Calculator</title>
</head>

<body>
<h1>Calc</h1>

<?php
// here we retrieve ALL the variables sent by the form using the POST method; we set our own PHP variables to the form variables.
$num1 = $_POST['num1'];
// do the other 2 variables yourself !!!!
$op = $_POST['op'];
$num2 = $_POST['num2'];
// echo $num1 . "<br />"; // here's how we test the value.
// echo $op . "<br />"; 
// echo $num2 . "<br />";
	if((is_numeric($num1)) && (is_numeric($num2))){
	switch($op){// this switch statement is based on the value of the operator variable you created above.
		case "+": // the user selected the + operation
			// create a var called $result and do the math
			$result = $num1 + $num2;
			break;
			// add 3 more cases for each possible operation
		case "-":
			$result = $num1 - $num2;
			break;
		case "*":
			$result = $num1 * $num2;
			break;
		case "/":
			$result = $num1 / $num2;
			break;
	} // switch
} // if is_numeric


?>

<form name="calcform" method="post" action="calculator.php"><!-- the action of the form MUST be the same as this file name; one must be changed -->

<input type="text" name="num1" value="<?php echo $num1; ?>" />
<select name="op">
	
	<?php 
		// if($op){
		// 	echo "\n\t<option selected>$op</option>\n";
		// }
	?>

<option <?php if(isset($op) && $op == "+"){echo "selected";} ?> value="+">+</option>
	<!-- <option value="+">+</option> -->
	<option <?php if(isset($op) && $op == "-"){echo "selected";} ?> value="-">-</option>
    <!-- <option value="-">-</option> -->
	<option <?php if(isset($op) && $op == "*"){echo "selected=";} ?> value="*">*</option>
    <!-- <option value="*">*</option> -->
	<option <?php if(isset($op) && $op == "/"){echo "selected=";} ?> value="/">/</option>
    <!-- <option value="/">/</option> -->
</select>

<input type="text" name="num2" value="<?php echo $num2; ?>" />
<input type="submit" name="submit" />
<?php
// here show the result of the calculation to the user.
if($result){
	echo "= ".  $result;
}
?>
</form>

</body>
</html>