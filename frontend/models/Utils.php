<?php

/**
 * Created by PhpStorm.
 * Author: Azamat Mirvosiqov
 * Date: 8/8/19
 * Time: 3:59 AM
 */

namespace frontend\models;

class Utils
{
    public static function resizeImage($img, $thumbWidth, $thumbHeight)
    {
        $size = getimagesize($img);

        if (($size[0] / $thumbWidth) > ($size[1] / $thumbHeight)) {
            $height = 0;
            $width = $size[0] - ( ( $size[1] * $thumbWidth ) / $thumbHeight );
        } else {
            $width = 0;
            $height = $size[1] - ( ( $size[0] * $thumbHeight ) / $thumbWidth );
        }

        $src = imagecreatefromstring(file_get_contents($img));
        $dst = imagecreatetruecolor($thumbWidth, $thumbHeight);
        imagecopyresampled($dst, $src, 0, 0, $width / 2, $height / 2, $thumbWidth, $thumbHeight, $size[0] - $width, $size[1] - $height);
        imagedestroy($src);

        $target_filename = $img;
        header('Content-type: image/jpeg');
        imagejpeg($dst, $target_filename);
        imagedestroy($dst);
    }
}