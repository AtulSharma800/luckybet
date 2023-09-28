<?php
// Include PHP Image Magician library
require_once('php_image_magician.php');

function resize_image($image_path,$width,$height)
	{
		$image_name=basename($image_path);
		$a=explode(".",$image_name);
		$new_name=$a[0]."".$width."x".$height.".".$a[1];
		// Open JPG image
		$magicianObj = new imageLib($image_path);

		// Resize to best fit then crop (check out the other options)
		$magicianObj -> resizeImage($width, $height, 'crop');

		// Save resized image as a PNG (or jpg, bmp, etc)
		$new_path="upload/thumbs/$new_name";
		$magicianObj -> saveImage($new_path);
		return $new_path;
	}

?>