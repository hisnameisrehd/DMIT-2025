<?php 

$im = imagecreatefromjpeg("img/horse.jpg");

imagegammacorrect($im, 1.0, 9.0);

/*
To save to a file instead of outputting directly to the browser:
1) We will add the file path/filename as the 2nd parameter of our output: imagejpeg($im, "pathto/filename.jpg")
2) We MAY have to change permissions on the parent folder using CHMOD. 
3) We MUST remove the header info.
4) We must remember that since we are not outputting anything to this file, we won't see anything. Unless we us something like an <img>.

*/



//header("Content-type: image/jpeg");

imagejpeg($im, "test.jpg");

imagedestroy($im);

 ?>
 <img src="test.jpg">