<?php

namespace common\helpers;


use Yii;

/**
 * Class FileSystemHelper
 * @package common\helpers
 */
class FileSystemHelper
{
    /**
     * @return string
     */
    public static function generateGuid()
    {
        $guid = 'pm';
        $uid = uniqid("", true);
        $data = $_SERVER['REQUEST_TIME'];
        $data .= $_SERVER['HTTP_USER_AGENT'];
        $hash = hash('ripemd128', $uid . $guid . md5($data));
        $guid = substr($hash, 0, 8) .
            '-' . substr($hash, 8, 4) .
            '-' . substr($hash, 12, 4) .
            '-' . substr($hash, 16, 4) .
            '-' . substr($hash, 20, 12);
        return $guid;
    }

    public static function createUserDir($dir)
    {
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
    }

    /**
     * @param $dir
     */
    public static function deleteEverything($dir)
    {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir . '/' . $object))
                        self::deleteEverything($dir . '/' . $object);
                    else unlink($dir . '/' . $object);
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }

    /**
     * @param $dir
     * @return bool
     */
    public static function isDirEmpty($dir)
    {
        if (count(scandir($dir)) == 2)
            return true;
        else
            return false;
    }

    public static function getZipFileLocation($guid)
    {
        date_default_timezone_set('Asia/Tashkent');
        $day = date('d');
        $month = date('m');
        $year = date('Y');
        return Yii::$app->params['uploadPath'] . "userFiles/user_file/{$year}/{$month}/{$day}/{$guid}.zip";
    }

    public static function removeUserEmptyFolders($tmpFilesDir)
    {
        for ($i = 0; $i < 3; $i++) {
            $tmpFilesDir = rtrim($tmpFilesDir, "/");
            $tmpFilesDir = substr($tmpFilesDir, 0, intval(strrpos($tmpFilesDir, "/") - strlen($tmpFilesDir)));
            if (self::isDirEmpty($tmpFilesDir) && substr($tmpFilesDir, intval(strrpos($tmpFilesDir, "/") - strlen($tmpFilesDir) + 1), strrpos($tmpFilesDir, "/")) != 'tmpUserFiles') {
                rmdir($tmpFilesDir);
            } else {
                break;
            }
        }
    }

    public static function resizeImage($img, $thumbWidth, $thumbHeight)
    {
        $size = getimagesize($img);

        if (($size[0] / $thumbWidth) > ($size[1] / $thumbHeight)) {
            $height = 0;
            $width = $size[0] - (($size[1] * $thumbWidth) / $thumbHeight);
        } else {
            $width = 0;
            $height = $size[1] - (($size[0] * $thumbHeight) / $thumbWidth);
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