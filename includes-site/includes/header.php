<?php
    // here we willcreate SEO friendly <title>s that will be dynamically written to each page.

    $thisFile = basename($_SERVER['PHP_SELF']);
    // echo $thisFile; // just for testing. DELETE before deployment.


    switch($thisFile){
        case "index.php":
            $thisPageTitle = "Dr. Seuss";
            $thisSideBarFile = "includes/sidebars/home-summary.html";
            break;
        case "cathat.php":
            $thisPageTitle = "The Cat In The Hat - Dr. Seuss";
            $thisSideBarFile = "includes/sidebars/cathat-summary.html";
            break;
        case "foxinsocks.php":
            $thisPageTitle = "Fox In Socks - Dr. Seuss";
            $thisSideBarFile = "includes/sidebars/foxinsocks-summary.html";
            break;
        case "onefish.php":
            $thisPageTitle = "One Fish, Two Fish, Red Fish, Blue Fish - Dr. Seuss";
            $thisSideBarFile = "includes/sidebars/onefish-summary.html";
            break;
        case "lorax.php":
            $thisPageTitle = "The Lorax - Dr. Seuss";
            $thisSideBarFile = "includes/sidebars/lorax-summary.html";
			break;
		case "greeneggs.php":
            $thisPageTitle = "Green Eggs And Ham - Dr. Seuss";
            $thisSideBarFile = "includes/sidebars/greeneggs-summary.html";
            break;
        default:
            $thisPageTitle = "Dr. Seuss";
            break;
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<title><?php echo $thisPageTitle; ?></title>
<style type="text/css">

@font-face {
  font-family: 'soos';
  src: url(doctor_soos/DoctorSoosLight1.woff)
}
html,body {
	font-family: 'soos';
	font-size: 18px;
	margin:0px;
    background: rgb(177, 255, 255);
	height:100%;
}

#outercontainer {
	width: 980px;
	margin-left:auto;
	margin-right: auto;
	background-image: url('images/shadow.png');
	height:auto !important; 
	min-height:100%;
}
#container {
	width: 960px;
	margin-left:auto;
	margin-right: auto;
	position:relative;
    background: rgb(252, 198, 225);
}
#masthead {
	height: 100px;
}
#topNav {
	padding: 3px 10px 3px 10px;
	/* background-color: #ccc; */
	border-top: 3px double #ccc;
	border-bottom: 3px double #ccc;
}
#topNav  a{
	font-weight: bold;
	color: #369;
	font-family: arial;
	text-decoration: none;
}
#topNav  a:hover{
	color: #900;
	text-decoration: underline overline;
}
#sideBarLeft{
	width: 300px;
	float:left;
}
#sideBarLeftPadding{
	padding: 5px 10px 5px 10px;
	font-size: 16px;
	font-family: Georgia, "Times New Roman", Times, serif;
	color: #666;
}
#contentCenter{
	width: 640px;
	float:left;
    /* border-left: 2px double rgb(255, 0, 128); */
}
#contentCenterPadding{
	padding: 5px 10px 5px 10px;

}
#sideBarRight{
	width: 200px;
	float:left;
}
#sideBarRightPadding{
	padding: 5px 10px 5px 0px;
}
#footer{
	width: 980px;
	margin-left:auto;
	margin-right: auto;
	background-image: url('images/shadow.png');
	text-align: center;
	height: 20px;
	font-size: 10px;
	color: #666;
	clear: both;
}
h2 {
	font-size: 16px;
	font-family: georgia;
	color: #336;
}
#sideBarRightPadding h2{
	font-family: 'soos';
	font-size: 14px;
	font-weight: bold;
	background-color: #666;
	padding: 2px;
	color: #fff;
	
}
ul
{
  margin-left: 3;
  padding-left: 3;
}

li {
	font-size: 11px;
	

}
.red-fish {
	color: red;
}
.blue-fish {
	color: blue;
}
</style>
</head>

<body>
<div id="outercontainer">
<div id="container">
	<div id="masthead">
	<img src="images/masthead.png" width="960" height="100" alt="" />
	</div><!-- close masthead -->
	<div id="topNav">

    
	<a href="index.php">Home</a> | 
	<a href="cathat.php">The Cat In The Hat</a> | 
	<a href="foxinsocks.php">Fox In Socks</a> | 
	<a href="onefish.php">One <span class="red-fish">Fish</span> Two <span class="blue-fish">Fish</span></a> | 
	<a href="lorax.php">The Lorax</a> | 
	<a href="greeneggs.php">Green Eggs And Ham</a> | 
	
    
    
	</div><!-- close topNav -->
	<div id="sideBarLeft">
		<div id="sideBarLeftPadding">
    <h2>Summary</h2>
    
    <?php
    if($thisSideBarFile){
        include($thisSideBarFile);
    }
    ?>

		</div><!-- close sideBarLeftPadding -->
	</div><!-- close sideBarLeft -->
	<div id="contentCenter">
		<div id="contentCenterPadding">
		
		