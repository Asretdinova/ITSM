<?php
/**
 * Created by PhpStorm.
 * Author: Azamat Mirvosiqov
 * Date: 14.12.2016
 * Time: 20:50
 */

namespace common\modules\fileUploader\controllers;

use Yii;
use yii\rest\Controller;

class RequestUploadController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionUploadProgress()
    {
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');
        }

        if (isset($_REQUEST['progresskey'])) {
            $status = apc_fetch('upload_' . $_REQUEST['progresskey']);
        } else {
            return ['success' => false];
        }

        $pct = 0;
        $size = 0;

        if (is_array($status)) {
            if (array_key_exists('total', $status) && array_key_exists('current', $status)) {
                if ($status['total'] > 0) {
                    $pct = round(($status['current'] / $status['total']) * 100);
                    $size = round($status['total'] / 1024);
                }
            }
        }

        return ['success' => true, 'pct' => $pct, 'size' => $size];
    }
}