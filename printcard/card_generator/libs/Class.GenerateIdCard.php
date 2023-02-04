<?php
/*
	Class Name: GenerateIdCard which inherit ImageProcessing class
	---------------------------
	
	@Author: Muhammed Imran Hussain
	@Email: imranweb7@{gmail}{yahoo}{hotmail}.com
	@Cell: +88-01714110953
	@last Modified: 06/12/2008
	
	
	Class Description:
	---------------------------
	=> This is main class to generate ID card
	=> Version needed PHP >= 4.1
*/

class GenerateIdCard extends ImageProcessing
{
	/*-----  declaring card holder related variables -----*/
	
	# ---- string------
	var $__card_holder_id = null;
	
	# ---- string------
	var $__card_holder_name = null;
	
	# ---- string------
	var $__card_holder_image = null;
	
	# ---- array------
	var $__card_holder_details = null;
	
	# ---- string------
	var $__card_issue_date = null;
	
	# ---- string------
	var $__card_expire_date = null;
	
	
	/*-----  declaring card provider related variables -----*/
	
	# ---- string------
	var $__card_provider_logo = _COMPANY_LOGO_IMG_;
	
	# ---- string------
	var $__card_provider_title_text = null;
	
	
	/*-----  directory info where card image will be stored -----*/
	
	# ---- string------
	var $__card_image_abs_path = _CARD_IMG_ABS_PATH_;
	
	# ---- string------
	var $__card_image_live_path = _CARD_IMG_LIVE_PATH_;
	
	
	/*--- MAIN OUTPUT LAYER IMAGE -----*/
	var $__image = null; 

	
	/*
		------------ CONSTRUCTOR -------------
		#
		# Access Modifier: Public
		# paramater1 = array of card info, (optional)paramater2 = absolute path of images, (optional)paramater3 = live path of images
		# Action: instatiate class variables, create image card layers
		# return void
		# Last modified: 06/12/2008
		#

	*/
	public function GenerateIdCard($params, $abs_path = '', $live_path = '')
	{
		/*------ select directory where file needs to be stored ----*/
		if($abs_path != '')
		{
			$this->__card_image_abs_path = $abs_path;
		}
		
		if($live_path != '')
		{
			$this->__card_image_live_path = $live_path;
		}
		
		
		/*----- initilalization card holder related content -----*/
		
		$this->__card_holder_id = $params['card_holder']['id'];
		
		$this->__card_holder_name = $this->getCardHolderName($params['card_holder']['name']);
		
		$this->__card_holder_image = $params['card_holder']['image'];		
		
		$this->customizeImage(_CARD_IMG_ABS_PATH_ .''. $this->__card_holder_image, _CARD_HOLDER_IMG_WIDTH_, _CARD_HOLDER_IMG_HEIGHT_);
		
		$this->__card_holder_details = $params['card_holder']['details'];
		
		$this->__card_issue_date = $params['card_holder']['issue_date'];
		
		$this->__card_expire_date = $params['card_holder']['expire_date'];
		
		
		/*----- initilalization card provider related content -----*/
		
		$this->__card_provider_title_text = $params['card_provider']['card_provider_title_text'];
		
		
		/*----- Calling function -----*/
		
		
		/*----- Initilization main image layer -----*/
		$this->initMainImage();		
		
		
		/*----- Creating card header and assigning to main layer -----*/
		$this->createCardHeader();
		
		
		/*----- Creating Card Holder name image and assigning to main layer -----*/
		$this->createCardHolderName();
		
		
		/*----- Creating Card Holder basic info image and assigning to main layer -----*/
		$this->createCardHolderBasicInfo();
		
		
		/*----- Creating Card Holder image and assigning to main layer -----*/
		$this->placeCardHolderPicture();
		
		
		/*----- Creating Card footer and assigning to main layer -----*/
		$this->createCardFooter();
	}
	// end public function GenerateIdCard($params, $abs_path = '', $live_path = '')
	
	
	
	/*
		#
		# Access Modifier: private
		# paramater null
		# Action: Initilizing main image layer
		# return void
		# Last modified: 06/12/2008
		#

	*/
	private function initMainImage()
	{
		$this->__image = $this->createImageFromImage(_CARD_IMG_LIVE_PATH_ . '' . _MAIN_CARD_BACKGROUND_IMG_); 
	}
	// end private function initMainImage()
	
	
	
	
	/*
		#
		# Access Modifier: private
		# paramater null
		# Action: Create card header image and  assiggn it to main layer image
		# return void
		# Last modified: 06/12/2008
		#

	*/
	private function createCardHeader()
	{
		$image = $this->createImageFromImage(_CARD_IMG_LIVE_PATH_ . '' . _CARD_HEADER_IMG_);
				
		$logo_temp_img = $this->createImageFromImage(_CARD_IMG_LIVE_PATH_ . '' . _COMPANY_LOGO_IMG_);
		
		$font_color = $this->createImageTextColor($image, _CARD_HEADER_TEXT_COLOR_CODE_RED_, _CARD_HEADER_TEXT_COLOR_CODE_GREEN_, _CARD_HEADER_TEXT_COLOR_CODE_BLUE_);
		
		imagecopy ($image, $logo_temp_img, 0, 5, 0, 0, $this->getImageWidth($logo_temp_img), $this->getImageHeight($logo_temp_img));
		
		$this->destroy($logo_temp_img); 
		
		imagettftext($image, 13, 0, 85, 30, $font_color, 'fonts/'._CARD_HOLDER_TITLE_TEXT_FONT_, $this->__card_provider_title_text);
		
		imagecopy ($this->__image, $image, 3, 3, 0, 0, $this->getImageWidth($image), $this->getImageHeight($image));
		
		$this->destroy($image);
	}
	// end private function createCardHeader()
	
	
	
	
	/*
		#
		# Access Modifier: private
		# paramater null
		# Action: Create card holer name template and  assiggn it to main layer image
		# return void
		# Last modified: 06/12/2008
		#

	*/
	private function createCardHolderName()
	{
		$image = $this->createImageFromImage(_CARD_IMG_LIVE_PATH_ . '' . _CARD_HOLDER_NAME_PLATE_IMG_);
		
		$font_color = $this->createImageTextColor($image, _CARD_HOLDER_NAME_TEXT_COLOR_CODE_RED_, _CARD_HOLDER_NAME_TEXT_COLOR_CODE_GREEN_, _CARD_HOLDER_NAME_TEXT_COLOR_CODE_BLUE_);

		$y = 14;
		
		imagettftext($image, 16, 0, 3, 18, $font_color, 'fonts/'._CARD_HOLDER_NAME_TEXT_FONT_, $this->__card_holder_name);

		imagecopy ($this->__image, $image, 3, 52, 0, 0, $this->getImageWidth($image), $this->getImageHeight($image));
				
		$this->destroy($image);
	}
	// end private function createCardHolderName()
	
	
	
	
	/*
		#
		# Access Modifier: private
		# paramater null
		# Action: Create card holder basic info template and assiggn it to main layer image
		# return void
		# Last modified: 06/12/2008
		#

	*/
	private function createCardHolderBasicInfo()
	{
		$image = $this->createImageFromImage(_CARD_IMG_LIVE_PATH_ . '' . _CARD_BASIC_INFO_IMG_);
		
		$font_color1 = $this->createImageTextColor($image, _CARD_DETAILS_TITLE_TEXT_COLOR_CODE_RED_, _CARD_DETAILS_TITLE_TEXT_COLOR_CODE_GREEN_, _CARD_DETAILS_TTITLE_TEXT_COLOR_CODE_BLUE_);
		
		$font_color2 = $this->createImageTextColor($image, _CARD_DETAILS_TEXT_COLOR_CODE_RED_, _CARD_DETAILS_TEXT_COLOR_CODE_GREEN_, _CARD_DETAILS_TEXT_COLOR_CODE_BLUE_);

		$y = 10;
		foreach($this->__card_holder_details as $k=>$v){	
			imagettftext($image, 10, 0, 0, $y, $font_color1, 'fonts/'._CARD_DETAILS_TITLE_TEXT_FONT_, $k.':');
			$y = $y+13;
				
			imagettftext($image, 10, 0, 0, $y, $font_color2, 'fonts/'._CARD_DETAILS_VALUE_TEXT_FONT_, $v);		
			$y = $y+17;
		}
		
		imagecopy ($this->__image, $image, 7, 82, 0, 0, $this->getImageWidth($image), $this->getImageHeight($image));
				
		$this->destroy($image);
	}
	// end private function createCardHolderBasicInfo()
	
	
	
	
	/*
		#
		# Access Modifier: private
		# paramater null
		# Action: Create card holder image template and assiggn it to main layer image
		# return void
		# Last modified: 06/12/2008
		#

	*/
	private function placeCardHolderPicture()
	{
		$image_holder = $this->createImageFromImage(_CARD_IMG_LIVE_PATH_ . '' . $this->__card_holder_image);		
		$border = _CARD_HOLDER_IMG_BORDER_; 		
		
		$tmp_width = $this->getImageWidth($image_holder);		
		$tmp_height = $this->getImageHeight($image_holder);
		
		
		$img_adj_width = $tmp_width + (2*$border);		
		$img_adj_height = $tmp_height + (2*$border);
		
		$new_tmp_image = $this->createRawImage($img_adj_width, $img_adj_height);
		
		$border_color = $this->createImageTextColor($new_tmp_image, _CARD_HOLDER_IMAGE_BORDER_COLOR_CODE_RED_, _CARD_HOLDER_IMAGE_BORDER_COLOR_CODE_GREEN_, _CARD_HOLDER_IMAGE_BORDER_COLOR_CODE_BLUE_);
		
		imagefilledrectangle($new_tmp_image, 0, 0, $img_adj_width, $img_adj_height, $border_color);
		
		imagecopy ($new_tmp_image, $image_holder, 5, 5, 0, 0, _CARD_HOLDER_IMG_WIDTH_, _CARD_HOLDER_IMG_HEIGHT_);


		imagecopy ($this->__image, $new_tmp_image, 235, 82, 0, 0, $this->getImageWidth($new_tmp_image), $this->getImageHeight($new_tmp_image));
				
		$this->destroy($new_tmp_image);
				
		$this->destroy($image_holder);
	}
	// end private function placeCardHolderPicture()
	
	
	
	
	/*
		#
		# Access Modifier: private
		# paramater null
		# Action: Create card footer image template and assiggn it to main layer image
		# return void
		# Last modified: 06/12/2008
		#

	*/
	private function createCardFooter()
	{
		$image = $this->createImageFromImage(_CARD_IMG_LIVE_PATH_ . '' . _CARD_HOLDER_BAR_PLATE_IMG_);
		
		$font_color_id = $this->createImageTextColor($image, _CARD_ID_TEXT_COLOR_CODE_RED_, _CARD_ID_TEXT_COLOR_CODE_GREEN_, _CARD_ID_TEXT_COLOR_CODE_BLUE_);
		
		$font_color_expire = $this->createImageTextColor($image, _CARD_EXP_TEXT_COLOR_CODE_RED_, _CARD_EXP_TEXT_COLOR_CODE_GREEN_, _CARD_EXP_TEXT_COLOR_CODE_BLUE_);

		imagettftext($image, 10, 0, 80, 12, $font_color_id, 'fonts/'._CARD_ID_TEXT_FONT_, 'ID: '.$this->__card_holder_id);
		
		imagettftext($image, 9, 0, 80, 26, $font_color_expire, 'fonts/'._CARD_ID_EXP_TEXT_FONT_, 'Validity: '.$this->__card_issue_date.' to '.$this->__card_expire_date);

		imagecopy ($this->__image, $image, 3, 172, 0, 0, $this->getImageWidth($image), $this->getImageHeight($image));
		
		$this->destroy($image);
	}
	// end private function createCardFooter()
	
	
	
	
	/*
		#
		# Access Modifier: private
		# paramater1 = filename, parameter2 = int custom image width, parameter3 = int custom image height
		# Action: Resizing image and saving it
		# return void
		# Last modified: 06/12/2008
		#

	*/
	private function customizeImage($filename, $width, $height)
	{
		$imgThumbs = $this->initImage(strtolower($filename));
		
		$this->resizeImage($width, $height);
		
		$this->saveImage(strtolower($filename));	
	}
	// end private function customizeImage($filename, $width, $height)
	
	
	
	
	/*
		#
		# Access Modifier: private
		# paramater string name
		# Action: Formatting card holder name string
		# return string name
		# Last modified: 06/12/2008
		#

	*/
	private function getCardHolderName($txt)
	{
		$lentgh = strlen($txt);
		
		if($lentgh > _TOTAL_TEXT_IN_CARD_)
		{
			$txt = substr($txt, 0, _TOTAL_TEXT_IN_CARD_);
		} 
		
		return $txt;
	}
	// end private function getCardHolderName($txt)
	
	
	
	
	/*
		#
		# Access Modifier: public
		# paramater null
		# Action: give image output to browser
		# return null
		# Last modified: 06/12/2008
		#

	*/
	public function ImageOutput()
	{
		header("Content-type: image/jpeg"); 	
				
		imagejpeg($this->__image); 
	}

}
?>