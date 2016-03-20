<?php

function generateImg($email, $path_png){

    if (strlen($email)<8) {
        $CAPTCHA_WIDTH=120;
    }else{
        $CAPTCHA_WIDTH = 15*(strlen($email)-1);
    };
    $CAPTCHA_HEIGHT = 50;
    $PATH_FONT = 'fonts/Roboto-Regular.ttf';

    $img = imagecreatetruecolor($CAPTCHA_WIDTH, $CAPTCHA_HEIGHT);
    $bg_color = imagecolorallocate($img, 255, 255, 255);
    $text_color = imagecolorallocate($img, 0, 0, 0);

    $bbox=imagettfbbox(18, 0, $PATH_FONT, $email );
    $x = $bbox[0] + (imagesx($img) / 2) - ($bbox[4] / 2);
    $y = $bbox[1] + (imagesy($img) / 2) - ($bbox[5] / 2) - 5;

    imagefilledrectangle($img, 0, 0, $CAPTCHA_WIDTH, $CAPTCHA_HEIGHT, $bg_color);
    imagettftext($img, 18, 0, $x, $y, $text_color, $PATH_FONT, $email);

    imagepng($img, $path_png);
    imagedestroy($img);
}

