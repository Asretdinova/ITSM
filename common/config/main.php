<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Asia/Tashkent',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'reCaptcha' => [
            'class' => 'himiklab\yii2\recaptcha\ReCaptchaConfig',
            'siteKeyV2' => '6LeSNC0aAAAAAJBWYXINJP6G50_SinWkjWjluXj4',
            'secretV2' => '6LeSNC0aAAAAAECT_uuB2hA-u8xZGgKlYAie__7b',
        ],

    ],
    'bootstrap' => [
        'chiliec\vote\components\VoteBootstrap',
        'coderius\hitCounter\config\Bootstrap',
    ],
    'modules'=>[
        'hitCounter'=>[
            'class' => 'coderius\hitCounter\Module',

        ],
        'vote' => [
            'class' => 'chiliec\vote\Module',
            // show messages in popover
            'popOverEnabled' => true,
            // global values for all models
            // 'allowGuests' => true,
            // 'allowChangeVote' => true,
            'models' => [
                // example declaration of models
                // \common\models\Post::className(),
                // 'backend\models\Post',
                // 2 => 'frontend\models\Story',
                // 3 => [
                //     'modelName' => \backend\models\Mail::className(),
                //     you can rewrite global values for specific model
                //     'allowGuests' => false,
                //     'allowChangeVote' => false,
                // ],
            ],      
        ],
    ],
];
