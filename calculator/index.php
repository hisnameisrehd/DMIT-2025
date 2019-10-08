<!DOCTYPE html>

<head>
<title>PHP Calculator</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body>
	<style>
		html, body {
			background: rgb(190, 190, 190);
		}
		#xsmaller {
			width: 65px;
		}
		#jank-center {
			margin-top: 5rem;
    		display: flex;
    		justify-content: center;
    		align-items: center;
			background: rgb(207, 255, 195);
			margin-left:14%;
			margin-right:14%;
			padding-top:2rem;
			padding-bottom:2rem;
			max-width:600px;
		}
	</style>
	<div class="container">
		<?php
// here we retrieve ALL the variables sent by the form using the POST method; we set our own PHP variables to the form variables.
$num1 = $_POST['num1'];
// do the other 2 variables yourself !!!!
$op = $_POST['op'];
$num2 = $_POST['num2'];
// echo $num1 . "<br />"; // here's how we test the value.
// echo $op . "<br />";
// echo $num2 . "<br />";
if ((is_numeric($num1)) && (is_numeric($num2))) {
    switch ($op) {// this switch statement is based on the value of the operator variable you created above.
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
	<div class="container h-100">
		<div id="jank-center" class="row h-100 justify-content-center align-items-center">
			<form name="calcform" class="formstyle col-12" method="post" action="index.php"><!-- the action of the form MUST be the same as this file name; one must be changed -->
			<h1 class="text-align-center">Calculator</h1>
			<div class="form-group">
				<input class="form-control" type="number" name="num1" value="<?php echo $num1; ?>" />
			</div>
			<div class="form-group">
				<select id="xsmaller" class="form-control" name="op">
				 
				 <?php
                     // if($op){
                     // 	echo "\n\t<option selected>$op</option>\n";
                     // }
                 ?>
			 
				 <option <?php if (isset($op) && $op == "+") {
                     echo "selected";
                 } ?> value="+">+</option>
				 <!-- <option value="+">+</option> -->
				 <option <?php if (isset($op) && $op == "-") {
                     echo "selected";
                 } ?> value="-">-</option>
				 <!-- <option value="-">-</option> -->
				 <option <?php if (isset($op) && $op == "*") {
                     echo "selected=";
                 } ?> value="*">*</option>
				 <!-- <option value="*">*</option> -->
				 <option <?php if (isset($op) && $op == "/") {
                     echo "selected=";
                 } ?> value="/">/</option>
				 <!-- <option value="/">/</option> -->
			 </select>
		 </div>
		 <div class="form-group">
			 <input class="form-control" type="number" name="num2" value="<?php echo $num2; ?>" />
		 </div>
		 <div class="form-group">
			 <input class="btn btn-success" type="submit" name="submit" />
		 </div>
		 <?php
		 // here show the result of the calculation to the user.
		 if(!$num1 || !$num2)
		 {
			echo "<h4 class=\"alert alert-danger\">Empty Fields</h4>";
		 }
         if ($result) {
			echo "<h4 class=\"alert alert-info\">= $result</h4>";
		}
		 else{
			if($num1 != "" && $num2 != "" && $result == 0)
			{
				echo "<h4 class=\"alert alert-info\">= 0</h4>";
			}
		 }
         ?>
		 </div>
	  </form>
  </div>
</div>

</body>
</html>