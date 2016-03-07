<?php

function generateImg($email, $path_png){

    $CAPTCHA_WIDTH = 300;
    $CAPTCHA_HEIGHT = 50;
    $PATH_FONT = 'fonts/Roboto-Regular.ttf';

    $img = imagecreatetruecolor($CAPTCHA_WIDTH, $CAPTCHA_HEIGHT);
    $bg_color = imagecolorallocate($img, 255, 255, 255);
    $text_color = imagecolorallocate($img, 0, 0, 0);

    imagefilledrectangle($img, 0, 0, $CAPTCHA_WIDTH, $CAPTCHA_HEIGHT, $bg_color);
    imagettftext($img, 18, 0, 5, $CAPTCHA_HEIGHT-5, $text_color, $PATH_FONT, $email);

    imagepng($img, $path_png);

    imagedestroy($img);
}

