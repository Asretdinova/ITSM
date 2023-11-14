<?php

$config = [
    'components' => [
        'request' => [
            'cookieValidationKey' => 'gl0kbBUKzTLRJQ7KqPPO_MegTtAopvJv',
        ],
    ],
];

if (!YII_ENV_TEST) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
        'generators' => [
            'crud' => [
                'class' => 'common\codeTemplates\generators\crud\Generator',
                'templates' => [
                    'translated' => '@webroot/../../common/codeTemplates/generators/crud/default',
                ]
            ]
        ],
    ];
}

return $config;
