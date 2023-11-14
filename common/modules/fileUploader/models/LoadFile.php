<?php
/**
 * Created by PhpStorm.
 * User: a_isokov
 * Date: 18.07.2017
 * Time: 14:53
 */

namespace common\modules\fileUploader\models;

use common\helpers\DebugHelper;
use Yii;
use common\helpers\ZipHelper;
use common\helpers\GeneralHelper;
use common\helpers\FileSystemHelper;
use common\models\generated\EntityFields;
use common\modules\fileUploader\helpers\FilesHelper;

/**
 * Class LoadFile
 * @package common\modules\fileUploader\models
 */
class LoadFile
{
    public static function userFile($guid, $deleteFileUrl, $params)
    {
        $field = EntityFields::findOne($params['_field']);

        $upload_dir = Yii::getAlias('@frontend') . "/uploads/tmpUserFiles/{$field->entity_id}/{$params['_guid']}/{$field->code_name}/files";
        $zipFile = FileSystemHelper::getZipFileLocation($field, $guid);

        FilesHelper::createUserDir($upload_dir);

        $manifestData = json_decode(file_get_contents($upload_dir . '/../manifest.json'), true);

        $zip = ZipHelper::extractZip($zipFile, $upload_dir);

        if ($zip != false) {
            $manifestData['downloaded'] = $zip;
        }

        file_put_contents($upload_dir . '/../manifest.json', json_encode($manifestData));

        $html = '';
        foreach ($manifestData['downloaded'] as $file) {
            $fileInfo = explode('.', $file);
            $html .= '
                <li class="fuPill fu-Success">
                    <a href=\'' . $deleteFileUrl . '?_file=' . $file . '&_params=' . json_encode($params) . '\' onclick="fileUploader.setDeleteFileBtn(this, \'' . Yii::t('common', 'Вы действительно хотите удалить данный файл?') . '\',\'' . $params['_modelName'] . '\', \'' . $field->code_name . '\'); return false;" class="cancelBtn">
                        <span>×</span>
                    </a>
                    <div class="filesListBoxIcon pull_left">
                        <i class="fu_icon fu_' . end($fileInfo) . '"></i>
                    </div>
                    <p class="fileUploaderFileName">' . $file . '</p>
                    <p><p class="fuMessage">' . Yii::t('common', 'Файл загружен') . '</p></p>
                </li>
            ';
        }

        return $html;
    }
}