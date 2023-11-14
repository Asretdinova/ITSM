<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'chiliec\vote\components\VoteBootstrap',],
    'controllerNamespace' => 'frontend\controllers',
    'language' => 'uz',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                    'sourceLanguage' => 'ru',
                    'fileMap' => [
                        'main' => 'main.php',
                        'yii' => 'yii.php',
                    ],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => 'codemix\localeurls\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableDefaultLanguageUrlCode' => true,
            'enableLanguageDetection' => false,
            'languages' => ['uz', 'en', 'ru'],
            'rules' => [
                '' => '/site/index',
                'digital-services' => '/site/digital-services',
                'concept-development' => '/site/concept-development',
                'logistics-and-events' => '/site/logistics-and-events',
                'media' => '/site/media',
                'hr' => '/site/hr',
                'page/about' => 'page/about',
                'page/team' => 'page/team',
                'page/job' => 'page/job',
                'page/contacts' => 'page/contacts',
                'page/structure' => 'page/structure',
                'page/partners' => 'page/partners',
                'page/<name:\S+>' => 'page/view',
                'gallery' => 'gallery/index',
                'video-gallery' => 'video-gallery/index',
                'aboutmedia' => 'aboutmedia/index',
                'inner' => 'projects/inner',

                '<controller:\w+>/<id:\d+>/' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

                '<module>/<controller>' => '<module>/<controller>',
                //                '<module>/<controller>/<id:\d+>' => '<module>/<controller>/view',
                '<module>/<controller>/<action>' => '<module>/<controller>/<action>',
                '<module>/<controller>/<action>/<id:\d+>' => '<module>/<controller>/<action>',
                '<module>/<controller>/<action>/<id:\d+>/<title>' => '<module>/<controller>/<action>',
                '<module>/<controller>/<id:\d+>/<title>' => '<module>/<controller>/index',
                '<module>/<controller>/<action>/<code:\w+>/' => '<module>/<controller>/<action>',
            ],
        ],
        'seo' => [
            'class' => 'frontend\components\SeoComponents',
        ],
        'metamaster' => [
            'class' => 'floor12\metamaster\MetaMaster',
            'siteName' => 'My cool new Web Site',
            'defaultImage' => '/design/export_logo.png',
        ],
    ],
    'modules' => [
        'vote' => [
            'class' => 'chiliec\vote\Module',
            // show messages in popover
            'popOverEnabled' => true,
            // global values for all models
            'allowGuests' => true,
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
    'params' => $params,
];
