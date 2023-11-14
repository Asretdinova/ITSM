<?php
return [
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=itsm',
            'username' => 'itsm_user',
            'password' => 'secret',
            'charset' => 'utf8',
        ],
    ],
];
