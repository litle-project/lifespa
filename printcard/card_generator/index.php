<?php
define("_SLG_", 1);
require_once("constants.php");
require_once("libs/Class.ImageProcessing.php");
require_once("libs/Class.GenerateIdCard.php");

$params = array();

$params['card_holder']['id'] = 'p1254edce';
$params['card_holder']['name'] = 'Muhammed Imran Hussain';
$params['card_holder']['image'] = 'customer.jpg';
$params['card_holder']['details'] = array(
										'DOB'=>'23/10/1985',
										'City'=>'Dhaka',
										'Nationality'=>'Bangladeshi'					
									);
									
$params['card_holder']['issue_date'] = "10/25/2008";							
$params['card_holder']['expire_date'] = "10/25/2010";			

$params['card_provider']['card_provider_title_text'] = "beta version 2.0";						

$objCard = new GenerateIdCard($params);
$objCard->ImageOutput();
?>
