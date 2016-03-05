<?php
session_start();
define('CAPTCHA_WIDTH', 300);
define('CAPTCHA_HEIGHT', 50);
define('PATH_FONT', 'fonts/Roboto-Regular.ttf');

$email=$_SESSION['email'];
$path_png='/complete_png/'.$email.'.png';

$_SESSION['path_png']=$path_png;
$path_png=$_SERVER['DOCUMENT_ROOT'].$path_png;


$img = imagecreatetruecolor(CAPTCHA_WIDTH, CAPTCHA_HEIGHT);
$bg_color = imagecolorallocate($img, 255, 255, 255);
$text_color = imagecolorallocate($img, 0, 0, 0);
$graphic_color = imagecolorallocate($img, 64, 64, 64);

imagefilledrectangle($img, 0, 0, CAPTCHA_WIDTH, CAPTCHA_HEIGHT, $bg_color);

/*for ($i=0; $i<5; $i++)
{
    imageline($img, 0, rand() %CAPTCHA_HEIGHT, CAPTCHA_WIDTH, rand() %CAPTCHA_HEIGHT, $graphic_color);
}
*/

imagettftext($img, 18, 0, 5, CAPTCHA_HEIGHT-5, $text_color, PATH_FONT, $email);
header("Content-type: image/png");
imagepng($img, $path_png);
imagepng($img);

imagedestroy($img);