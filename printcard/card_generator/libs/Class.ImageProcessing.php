<?php
/*
	Class Name: ImageProcessing
	---------------------------
	
	@Author: Muhammed Imran Hussain
	@Email: imranweb7@{gmail}{yahoo}{hotmail}.com
	@Cell: +88-01714110953
	@last Modified: 05/12/2008
	
	
	Class Description:
	---------------------------
	=> This class perform common image opertation using PHP GD library
	=> Version needed PHP >= 4.1
*/


class ImageProcessing
{
	/*----- Temporary class variables -----*/
	
	# ---- string------
	var $__temp_file_name = null;
	
	# ---- string------
	var $__temp_image_info = null;
	
	# ---- string------
	var $__temp_image_width = null;
	
	# ---- string------
	var $__temp_image_height = null;
	
	# ---- string------
	var $__temp_image = null;
	
	# ---- string------
	var $__temp_org_image = null;
	
	
	/*
		#
		# Access Modifier: Public
		# paramater = image file or source
		# return the size of an image
		# Last modified: 04/12/2008
		#

	*/
	public function getImageInfo($image_file)
	{
		return getimagesize($image_file);
	}
	// end public function getImageInfo($image_file)
	
	
	/*
		#
		# Access Modifier: Public
		# paramater = image file or source
		# returns an image identifier representing the image obtained from the given filename. 
		# Last modified: 04/12/2008
		#

	*/
	public function createImageFromImage($image_file)
	{
		$img = $this->getImageInfo($image_file);
		
		switch($img['mime']) {
			case 'image/png' : 
				$image = imagecreatefrompng($image_file); 
			break;
			//
			
			case 'image/jpeg': 
				$image = imagecreatefromjpeg($image_file); 
			break;
			//
			
			case 'image/gif' : 
				$old_id = imagecreatefromgif($image_file); 
				$image  = $this->createRawImage($img[0], $img[1]); 
				imagecopy($image, $old_id, 0, 0, 0, 0, $img[0], $img[1]); 
			break;
			//
			
			default: break;
		}// end switch($img['mime']) {
		
		return $image; 
	}
	// end public function createImageFromImage($image_file)
	
	
	/*
		#
		# Access Modifier: Public
		# paramater1 = int width, parameter2 = int height
		# returns an image identifier representing a black image of size x_size by y_size. 
		# Last modified: 04/12/2008
		#

	*/
	public function createRawImage($dim_x, $dim_y)
	{
		return imagecreatetruecolor($dim_x, $dim_y); 
	}
	// end public function createRawImage($dim_x, $dim_y)
	
	
	/*
		#
		# Access Modifier: Public
		# paramater = image identifier
		# returns image width
		# Last modified: 04/12/2008
		#

	*/
	public function getImageWidth($img)
	{
		return imagesx($img);
	}
	// end public function getImageWidth($img)
	
	
	
	/*
		#
		# Access Modifier: Public
		# paramater = image identifier
		# returns image height
		# Last modified: 04/12/2008
		#

	*/
	public function getImageHeight($img)
	{
		return imagesy($img);
	}
	// end public function getImageHeight($img)
	
	
	/*
		#
		# Access Modifier: Public
		# paramater = image or image source
		# Action: initialize an image for resize or for other operations
		# returns void
		# Last modified: 04/12/2008
		#

	*/
	public function initImage($image_file) 
	{
		if(!function_exists('imagecreatefrompng')) return; //GD not available
		
		if(!file_exists($image_file) or !is_readable($image_file)) return;
		
		$this->__temp_file_name = $image_file;

		$img = $this->getImageInfo($image_file);
		
		$image  = $this->createImageFromImage($image_file); 

		$this->__temp_image_info		= $img;
		
		$this->__temp_image_width	= $this->getImageWidth($image);
		
		$this->__temp_image_height	= $this->getImageHeight($image);
		
		$this->__temp_image	= $this->__temp_org_image = $image;
	}
	// end public function initImage($image_file) {
	
	
	
	/*
		#
		# Access Modifier: Public
		# paramater1 = int new_width, parameter2 = int new_height, (optional)parameter3 = booleanr
		# Action: resize image
		# returns new image resource
		# Last modified: 04/12/2008
		#

	*/
	public function resizeImage($new_width, $new_height, $use_resize = true) 
	{
		
		if(!$this->__temp_image) return false;
		
		if(!$new_height and !$new_width) return false; //Both width and height is 0
		
		$height = $this->__temp_image_height;
		
		$width  = $this->__temp_image_width;
		
		//If the width or height is give as 0, find the correct ratio using the other value
		if(!$new_height and $new_width) $new_height = $height * $new_width / $width; //Get the new height in the correct ratio
		
		if($new_height and !$new_width) $new_width	= $width  * $new_height/ $height;//Get the new width in the correct ratio

		//Create the image
		$new_image = $this->createRawImage($new_width, $new_height);
		
		imagealphablending($new_image, false);
		
		if($use_resize) imagecopyresized($new_image, $this->__temp_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		
		else imagecopyresampled($new_image, $this->__temp_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		
		$this->__temp_image = $new_image;
		
		return $this;
	}
	// end public function resizeImage($new_width, $new_height, $use_resize = true) 
	
	
	/*
		#
		# Access Modifier: Public
		# paramater1 = file name, (optional)parameter2 = booleanr
		# Action: resize image
		# returns new image resource
		# Last modified: 04/12/2008
		#

	*/
	public function saveImage($file_name, $destroy = true) 
	{
		if(!$this->__temp_image) return false;
		
		$extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
		
		switch($extension) {
			case 'png' : 
				return imagepng($this->__temp_image, $file_name); 
			break;
			//
			
			case 'jpeg': 
			case 'jpg' : 
				return imagejpeg($this->__temp_image, $file_name); 
			break;
			//
			
			case 'gif' : 
				return imagegif($this->__temp_image, $file_name);
			break;
			//
			
			default: break;
		}
		
		if($destroy){
			$this->destroy($this->image);
			
			$this->destroy($this->org_image);
		}
		
		return false;
	}
	// end public function saveImage($file_name, $destroy = true) 
	
	
	/*
		#
		# Access Modifier: Public
		# paramater1 = file name, (optional)parameter2 = booleanr
		# Action: resize image
		# returns new image resource
		# Last modified: 04/12/2008
		#

	*/
	public function createImageTextColor($image, $red, $green, $blue)
	{
		return imagecolorallocate($image, $red, $green, $blue);
	}
	// end public function createImageTextColor($image, $red, $green, $blue)
	
	
	/*
	 	# Destroy the image to save the memory. Do this after all operations are complete.
	*/
	public function destroy($img) 
	{
		 imagedestroy($img);
	}
	// end public function destroy($img) 
	
}// end of class ImageProcessing
?>