<?php
/**
 * Created by PhpStorm.
 * Author: Azamat Mirvosiqov
 * Date: 14.12.2016
 * Time: 20:56
 */

namespace common\modules\fileUploader\models;

use yii\web\AssetBundle;

/**
 * Class Assets
 * @package common\modules\fileUploader\models
 */
class Assets extends AssetBundle
{
    public $sourcePath = '@common/modules/fileUploader/assets';
    public $css = [
        'css/fileUploader.css',
    ];
    public $js = [
        'js/SimpleAjaxUploader.js',
        'js/fileUploader.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}