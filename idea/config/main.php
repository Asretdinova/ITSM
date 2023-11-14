<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-idea',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'idea\controllers',
    'language' => 'uz',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-idea',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-idea', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'advanced-idea',
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
                    'basePath' => '@idea/messages',
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
            'languages' => ['uz', 'ru', 'en'],
            'rules' => [
                '' => '/site/index',

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
        'socialShare' => [
            'class' => \ymaker\social\share\configurators\Configurator::className(),
            'socialNetworks' => [
                'facebook' => [
                    'class' => \ymaker\social\share\drivers\Facebook::className(),
                    'label' => '<i class="fab fa-facebook-f" data-toggle="tooltip" title="Facebook"></i>'
                ],
                'telegram' => [
                    'class' => \ymaker\social\share\drivers\Telegram::className(),
                    'label' => '<i class="fab fa-telegram-plane" data-toggle="tooltip" title="Telegram"></i>'
                ],
            ],
        ],
    ],
    'params' => $params,
];
