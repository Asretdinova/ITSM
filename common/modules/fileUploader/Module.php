<?php
/**
 * Created by PhpStorm.
 * Author: Azamat Mirvosiqov
 * Date: 14.12.2016
 * Time: 20:49
 */

namespace common\modules\fileUploader;

use Yii;

/**
 * Class Module
 * @package common\modules\fileUploader
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\fileUploader\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['common/modules/fileUploader/*'] = [
            'class'          => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => Yii::$app->language,
            'basePath'       => '@common/modules/fileUploader/messages',
            'fileMap'        => [
                'common/modules/fileUploader' => 'fileUploader.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/fileUploader/' . $category, $message, $params, $language);
    }

}