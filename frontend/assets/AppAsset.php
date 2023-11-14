<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css?v=26',
        'css/menu.css',
        'css/media.css?v=22',
        'css/fontawesome.min.css',
        'css/solid.min.css',
        'css/brands.min.css',
        'css/star-rating-svg.css',
    ];
    public $js = [
        'js/sharer.min.js',
        'js/jquery.star-rating-svg.js',
        'js/loader.js',
        'js/main.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
