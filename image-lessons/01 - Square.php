<?php 

$image = imagecreate(200,200);// create the image resource

// image processing
$green = imagecolorallocate($image, 0, 255, 0);
imagefill($image,0,0, $green);

header("Content-type: image/png");// define the header info IF outputting directly to the browser.

imagepng($image); // output the image

imagedestroy($image); // destroy the image resource to free up memory


 ?>