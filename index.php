<?php

function getImages($folderName) {
    return array_diff(scandir($folderName), ['.', '..']);
}

header("Content-type: image/jpg");

$imgs = getImages("imgs");

foreach ($imgs as $key => $value) {
    $img = imageCreateFromJpeg(dirname(__FILE__) . "/imgs/" . $value);

    $text = "Lorem Picsum";
    $font = dirname(__FILE__) . '/font/seguihis.ttf';

    imagettftext($img, 10, 0, 10, 20, imagecolorallocate($img, 0, 0, 0), $font, $text);

    imageJpeg($img, "res-imgs/img_" . uniqid() . ".jpg");
    imagedestroy($img);
}