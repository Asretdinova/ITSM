<?php

namespace idea\assets;

use yii\web\AssetBundle;

/**
 * Main idea application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css?v10',
        'css/media.css?v10',
        'css/fontawesome.min.css',
        'css/solid.min.css',
        'css/brands.min.css',
    ];
    public $js = [
        'js/main.js',
        'js/jquery.cookie.js',
        'js/isotope.pkgd.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];
}
