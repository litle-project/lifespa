<?

// show the correct header for the image type
  header("Content-type: image/png");

  // an email address in a string
  $string = "email@example.com";

  // some variables to set
  $font  = 12;
  $width  = ImageFontWidth($font) * strlen($string);
  $height = ImageFontHeight($font);

  // lets begin by creating an image
  $im = @imagecreatetruecolor ($width,$height);

  //white background
  $background_color = imagecolorallocate ($im, 255, 255, 255);

  //black text
  $text_color = imagecolorallocate ($im, 0, 0, 0);

  // put it all together
  imagestring ($im, $font, 0, 0,  $string, $text_color);

  // and display
  imagepng ($im);
  
  ?>