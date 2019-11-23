<?php
include("mysql_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Filtering a Database</title>
<style type="text/css">

body{
	font-family: verdana;
	font-size:90%;
	padding:20px;
	background-color: #ccc;
}
#container{
	width: 1160px;
	margin: auto;
	background-color: #fff;
	padding: 10px;
	
}
#links{
	width: 220px;
	margin:10px;
	padding: 7px;

	float:left;
	
}
#results{
	width: 600px;
	margin:10px;
	padding: 7px;
	
	float:left;
	
	
}
/**/
#widgets{
	width: 220px;
	margin:10px;
	padding: 7px;

	float:left;
	
}

#results a, #widgets a{
font-size: 11px;
}
h2{
	font-family: georgia;
	color: #444;
	font-size: 20px;	
}
h3{
	font-family: georgia;
	color: #900;
	font-size: 16px;	
}
.thumb{
	width: 122px;
	padding:5px;
	height: 104px;
	float:left;
	overflow:hidden;
	font-size: 11px;
	/* Sexy Thumbnails...but only if you think you are worthy 
	margin:8px;
	background-color: #fff;
	box-shadow: 0px 0px 2px #000;*/
}
.thumb img{
	/* border: 1px solid #000; */
}
.thumb a{
	text-decoration:none;
}
</style>
</head>

<body>
<div id="container">
<h1><a href="index.php">Filtering a Database</a></h1>


<div id="links">
	<h2>HTML Links with Query String</h2>
	<h3>Default: No filter</h3>
	<a href="index.php">ALL Cheese </a><br />

	<h3>Filter by a Column = Value</h3>
	<a href="index.php?displayby=type&displayvalue=soft">Soft Cheese</a>
	<br />
	<a href="index.php?displayby=type&displayvalue=hard">Hard Cheese</a>
	<br />
	<a href="index.php?displayby=type&displayvalue=blue">Blue Cheese</a>
	<br />
	<!-- <a href="index.php?displayby=lowshedding&displayvalue=yes">Lowshedding Dogs</a>
	<br />
	<a href="index.php?displayby=guard&displayvalue=1">Guard Dogs</a>
	<br />
	<a href="index.php?displayby=children&displayvalue=yes">Good Dogs w/ Children</a>
	<br /> -->
	<h3>Filter by an ID=Value, so 1 result Only</h3>
	<!-- <a href="index.php?displayby=pooch_id&displayvalue=16">Rottweiler</a>
	<br /> -->
	<h3>Filter by Age</h3>
	<a href="index.php?displayby=age&min=1&max=4">1-4 Week Aged</a>
	<br />
	<a href="index.php?displayby=age&min=4&max=15">4-15 Week Aged</a>
	<br />
	<!-- <a href="index.php?displayby=intelligence&min=7&max=10">Smart Dogs</a>
	<br /> -->
	<h3>Filter using BETWEEN: </h3>
	<p>This would be great for price ranges</p>
	

</div>

