<?php

/**
 * Created by PhpStorm.
 * Author: Mamura Asretdinova
 * Date: 8/24/19
 * Time: 10:14 PM
 */

namespace backend\controllers;

use common\models\BaseModel;
use Yii;
use yii\web\HttpException;
use yii\web\UploadedFile;

class UploadController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionImage()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $file = UploadedFile::getInstanceByName('upload');
        $name = Yii::$app->security->generateRandomString(32);
        $explode = explode('.', $file->name);
        $ext = end($explode);

        if (!in_array($ext, ['jpg', 'png']))
            throw new HttpException(500, 'Wrong file format');

        $path = Yii::getAlias("@frontend/web/uploads/content/{$name}.{$ext}");

        if ($file->saveAs($path)) {
            return [
                "uploaded" => 1,
                "fileName" => "{$name}.{$ext}",
                "url" => BaseModel::getBaseUrl() . "/uploads/content/{$name}.{$ext}",
            ];
        } else
            throw new HttpException(500, 'Something went wrong :(');
    }
}