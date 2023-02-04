<?php
/*
	File Name: constant.php
	---------------------------
	
	@Author: Muhammed Imran Hussain
	@Email: imranweb7@{gmail}{yahoo}{hotmail}.com
	@Cell: +88-01714110953
	@last Modified: 06/12/2008
	
	
	File Description:
	---------------------------
	=> This is configuration file for image id card generator class
*/


/*>> absolute path >>*/
define('_CARD_IMG_ABS_PATH_', $_SERVER['DOCUMENT_ROOT']."/image_process/images/");

/*>> live path >>*/
define('_CARD_IMG_LIVE_PATH_', "http://localhost/image_process/images/");




/*>> card holder name string maximum length >>*/
define('_TOTAL_TEXT_IN_CARD_', 30);

/*>> card holder image width >>*/
define('_CARD_HOLDER_IMG_WIDTH_', 100);

/*>> card holder image height >>*/
define('_CARD_HOLDER_IMG_HEIGHT_', 77);

/*>> card holder image border >>*/
define('_CARD_HOLDER_IMG_BORDER_', 5);





/*
	# image configuration
*/

/*>> card provider logo file name >>*/
define('_COMPANY_LOGO_IMG_', "logo.jpg");


/*>> card provider header image layer >>*/
define('_CARD_HEADER_IMG_', "card_header.jpg");


/*>> main image layer >>*/
define('_MAIN_CARD_BACKGROUND_IMG_', "main.jpg");


/*>> card holder basic info image layer >>*/
define('_CARD_BASIC_INFO_IMG_', "info.jpg");


/*>> card holder name plate image layer >>*/
define('_CARD_HOLDER_NAME_PLATE_IMG_', "name_plate.jpg");


/*>> card bottom image layer >>*/
define('_CARD_HOLDER_BAR_PLATE_IMG_', "bar_plate.jpg");





/*
	# font configuration
	# all fonts are located in fonts folder
*/

/*>> card provider title font >>*/
define('_CARD_HOLDER_TITLE_TEXT_FONT_', "arialbd.ttf");


/*>> card holder basic info title font >>*/
define('_CARD_DETAILS_TITLE_TEXT_FONT_', "arialbd.ttf");


/*>> card holder basic info value font >>*/
define('_CARD_DETAILS_VALUE_TEXT_FONT_', "arial.ttf");


/*>> card holder name font >>*/
define('_CARD_HOLDER_NAME_TEXT_FONT_', "MTCORSVA.TTF");


/*>> card holder ID font >>*/
define('_CARD_ID_TEXT_FONT_', "arialbd.ttf");


/*>> card expire font >>*/
define('_CARD_ID_EXP_TEXT_FONT_', "verdana.ttf");





/*
	# font color in R=red, G=green, B=blue
*/


/*>> card provider title font >>*/
define('_CARD_HEADER_TEXT_COLOR_CODE_RED_', "65");

define('_CARD_HEADER_TEXT_COLOR_CODE_GREEN_', "60");

define('_CARD_HEADER_TEXT_COLOR_CODE_BLUE_', "60");



/*>> card holder basic info value font >>*/
define('_CARD_DETAILS_TEXT_COLOR_CODE_RED_', "65");

define('_CARD_DETAILS_TEXT_COLOR_CODE_GREEN_', "60");

define('_CARD_DETAILS_TEXT_COLOR_CODE_BLUE_', "60");



/*>> card holder basic info title font >>*/
define('_CARD_DETAILS_TITLE_TEXT_COLOR_CODE_RED_', "65");

define('_CARD_DETAILS_TITLE_TEXT_COLOR_CODE_GREEN_', "60");

define('_CARD_DETAILS_TTITLE_TEXT_COLOR_CODE_BLUE_', "60");



/*>> card holder name font >>*/
define('_CARD_HOLDER_NAME_TEXT_COLOR_CODE_RED_', "239");

define('_CARD_HOLDER_NAME_TEXT_COLOR_CODE_GREEN_', "117");

define('_CARD_HOLDER_NAME_TEXT_COLOR_CODE_BLUE_', "117");



/*>> card holder image border font >>*/
define('_CARD_HOLDER_IMAGE_BORDER_COLOR_CODE_RED_', "185");

define('_CARD_HOLDER_IMAGE_BORDER_COLOR_CODE_GREEN_', "26");

define('_CARD_HOLDER_IMAGE_BORDER_COLOR_CODE_BLUE_', "26");



/*>> card expire font >>*/
define('_CARD_EXP_TEXT_COLOR_CODE_RED_', "185");

define('_CARD_EXP_TEXT_COLOR_CODE_GREEN_', "26");

define('_CARD_EXP_TEXT_COLOR_CODE_BLUE_', "26");



/*>> card holder ID font >>*/
define('_CARD_ID_TEXT_COLOR_CODE_RED_', "185");

define('_CARD_ID_TEXT_COLOR_CODE_GREEN_', "26");

define('_CARD_ID_TEXT_COLOR_CODE_BLUE_', "26");
?>