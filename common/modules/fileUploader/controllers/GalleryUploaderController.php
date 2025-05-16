<?php

/**
 * Created by PhpStorm.
 * Author: Mamura Asretdinova
 * Date: 2/12/20
 * Time: 4:07 AM
 */

namespace common\modules\fileUploader\controllers;

use Yii;
use yii\rest\Controller;
use common\helpers\FileSystemHelper;
use common\modules\fileUploader\helpers\FilesHelper;
use common\modules\fileUploader\models\Uploader;

class GalleryUploaderController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionUpload()
    {
        $upload_dir = Yii::getAlias('@frontend') . "/web/uploads/mini_gallery";

        FileSystemHelper::createUserDir($upload_dir);
        /** @var Uploader $uploadModel */
        $uploadModel = new Uploader('photos');
        $uploadModel->sizeLimit = 1048576 * 10; //10MB
        $uploadModel->allowedExtensions = [
            'jpg'
        ];

        if ($uploadModel->getFileName() == 'null' || is_null($uploadModel->getFileName())) {
            return ['success' => false, 'msg' => Yii::t('common', 'Ошибка')];
        }

        $guid = FileSystemHelper::generateGuid();
        $uploadModel->newFileName = "{$guid}.{$uploadModel->getExtension()}";

        $result = $uploadModel->handleUpload($upload_dir);

        $mini = "{$upload_dir}/{$guid}_mini.{$uploadModel->getExtension()}";
        $uploadModel->save($mini);

        FileSystemHelper::resizeImage($mini, 350, 230);

        if (!$result) {
            return ['success' => false, 'msg' => $uploadModel->getErrorMsg()];
        }

        return [
            'success' => true,
            'guid' => $guid,
            'ext' => $uploadModel->getExtension()
        ];

    }
}