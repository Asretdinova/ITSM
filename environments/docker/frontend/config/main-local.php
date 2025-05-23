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
    ];
}

return $config;
