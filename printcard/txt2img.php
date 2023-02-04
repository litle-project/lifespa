<?

$card_center=$_REQUEST["card_center"];
$card_memberid=$_REQUEST["card_memberid"];
$card_name=$_REQUEST["card_name"];
$card_expired=$_REQUEST["card_expired"];
$im = imagecreatetruecolor(200, 90);

imagealphablending($im, false);
imagesavealpha($im, true);

// Create colors and draw transparent background
$trans = imagecolorallocatealpha($im, 255, 255, 255, 127);
$black = imagecolorallocate($im, 0,0, 0);
imagefilledrectangle($im, 0, 0, 299, 299, $trans);



// Good text
imagealphablending($im, true);
imagettftext($im, 11, 0, 0, 20, $black, 'arial.ttf', $card_center);
imagettftext($im, 11, 0, 0, 35, $black, 'arial.ttf', $card_memberid);
imagettftext($im, 11, 0, 0, 50, $black, 'arial.ttf', $card_name);
imagettftext($im, 11, 0, 0, 85, $black, 'arial.ttf', $card_expired);

/*** You'll need a copy of the arial.ttf font file in the same location as the PHP script ***/

// Output PNG
header("Content-type: image/png");
imagepng($im);
imagedestroy($im);

?>