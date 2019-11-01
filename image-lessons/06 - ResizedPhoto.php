<?php 

$image = imagecreatefromjpeg("img/butterfly.jpg");

// get original width and height
$width = imagesx($image);
$height = imagesy($image);

$ratio = $width/$height;
//echo "Width: $width | Height: $height | Ratio: $ratio"; // just for testing

$new_width = 100; // our desired width 

$new_height = $new_width/$ratio;
$image_resized = imagecreatetruecolor($new_width, $new_height);

// always use imagecopyresampled, and NEVER use imagecopyresized

imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $new_width, $new_height, $width , $height);

imagejpeg($image_resized, "image-resized.jpg");

imagedestroy($image_resized);
imagedestroy($image);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <img src="image-resized.jpg">
</body>
</html>