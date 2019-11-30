<?php
include("mysql_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Exploring Cheese</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



  <!-- Latest compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <!-- Google Icons: https://material.io/tools/icons/
  also, check out Font Awesome or Glyphicons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

 <!-- Themes from https://bootswatch.com/ : Use the Themes dropdown to select a theme you like; copy/paste the bootstrap.css. Here, we have named the downloaded theme as a new file and can overwrite the default.  -->
 <!-- <link href="<?php echo BASE_URL ?>css/bootstrap-slate.css" rel="stylesheet"> -->


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
	padding-top: 20px;
	margin-top: 65px;
	position: sticky;
}
#links{
	width: 220px;
	margin:10px;
	padding: 7px;

	float:left;
	
}
#results{
	width: 624px;
	margin:10px;
	padding: 7px;
	
	float:left;
	
	
}
/**/
#widgets{
	width: 220px;
	margin:10px;
	padding: 5px;

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
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4 fixed-top">
    <a class="navbar-brand" href="<?php echo BASE_URL ?>index.php"><i class="material-icons" style="font-size:36px">home</i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item active">
          <!-- This is a placeholder link. You will need to change this to link to your files. -->
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="<?php echo BASE_URL ?>admin/insert.php">Insert</a>
            <a class="dropdown-item" href="<?php echo BASE_URL ?>admin/edit.php">Edit</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <?php
          if (isset($_SESSION['PHP_Test_Secure'])) {
            echo "<a class=\"nav-link\" href=\"" .
              BASE_URL .
              "admin/logout.php\">Logout</a>";
          }
          ?>
        </li>
      </ul>
    </div>
  </nav>


  <div id="container">
	  
	  <h1><a href="<?php echo BASE_URL ?>index.php">Cheese DB</a></h1>
	  <div id="links">
	<h2>HTML Links with Query String</h2>
	<h3>Default: No filter</h3>
	<a href="<?php echo BASE_URL;?>index.php">ALL Cheese </a><br />

	<h3>Filter by cheese Classification</h3>
	<a href="<?php echo BASE_URL;?>index.php?displayby=classification&displayvalue=hard">Hard</a>
	<br />
	<a href="<?php echo BASE_URL;?>index.php?displayby=classification&displayvalue=semi-hard">Semi-Hard</a>
	<br />
	<a href="<?php echo BASE_URL;?>index.php?displayby=classification&displayvalue=semi-soft">Semi-Soft</a>
	<br />
	<a href="<?php echo BASE_URL;?>index.php?displayby=classification&displayvalue=soft">Soft</a>
	<br />
	<a href="<?php echo BASE_URL;?>index.php?displayby=classification&displayvalue=blue">Blue</a>
	<br />
	<!-- <a href="index.php?displayby=lowshedding&displayvalue=yes">Lowshedding Dogs</a>
	<br />
	<a href="index.php?displayby=guard&displayvalue=1">Guard Dogs</a>
	<br />
	<a href="index.php?displayby=children&displayvalue=yes">Good Dogs w/ Children</a>
	<br /> -->

	<!-- <h3>Filter by an ID=Value, so 1 result Only</h3> -->
	<!-- <a href="index.php?displayby=pooch_id&displayvalue=16">Rottweiler</a>
	<br /> -->

	<h3>Filter by an Age</h3>
	<a href="<?php echo BASE_URL;?>index.php?displayby=age&min=1&max=4">1-4 Months</a>
	<br />
	<a href="<?php echo BASE_URL;?>index.php?displayby=age&min=5&max=14">5-14 Months</a>
	<br />
	<a href="<?php echo BASE_URL;?>index.php?displayby=age&min=15&max=24">15-24 Months</a>
	<br />
	<a href="<?php echo BASE_URL;?>index.php?displayby=age&min=25&max=52">25-52 Months</a>
	<br />
	<!-- <a href="index.php?displayby=intelligence&min=7&max=10">Smart Dogs</a>
	<br /> -->
	<h3>Filter by Price range: </h3>
	<!-- <p>This would be great for price ranges</p> -->
	

</div>

