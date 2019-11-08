<?php 

function resizeImage($file, $folder, $newWidth){
    list($width, $height) = getimagesize($file);
    $imgRatio = $width/$height;
    $newHeight = $newWidth/$imgRatio;

    $thumb = imagecreatetruecolor($newWidth, $newHeight);
    $source = imagecreatefromjpeg($file);

    imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    $newFile = $folder . basename($_FILES['myfile']['name']);

    imagejpeg($thumb, $newFile, 80);

    imagedestroy($thumb);
    imagedestroy($source);
}


//// This function will create a square thumbnail image. Very cool for an Image Gallery as all images will be the same size and shape (square) so easy to align. It does so by cropping top/bottom for portrait pics; both sides for landscape pics.
// Best to use this for thumbs only; display pics should show the entire picture.


function createSquareImageCopy($file, $folder, $newWidth){
	
	//echo "$filename, $folder, $newWidth";
	//exit();

	$thumb_width = $newWidth;
	$thumb_height = $newWidth;// tweak this for ratio

	list($width, $height) = getimagesize($file);

	$original_aspect = $width / $height;
	$thumb_aspect = $thumb_width / $thumb_height;

	if($original_aspect >= $thumb_aspect) {
	   // If image is wider than thumbnail (in aspect ratio sense)
	   $new_height = $thumb_height;
	   $new_width = $width / ($height / $thumb_height);
	} else {
	   // If the thumbnail is wider than the image
	   $new_width = $thumb_width;
	   $new_height = $height / ($width / $thumb_width);
	}

	$source = imagecreatefromjpeg($file);
	$thumb = imagecreatetruecolor($thumb_width, $thumb_height);

	// Resize and crop
	imagecopyresampled($thumb,
					   $source,0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
					   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
					   0, 0,
					   $new_width, $new_height,
					   $width, $height);
	
	$newFileName = $folder. "/" .basename($file);
	imagejpeg($thumb, $newFileName, 80);

	echo "<p><img src=\"$newFileName\" /></p>";


}
?>