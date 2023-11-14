<?php

/**
 * Created by PhpStorm.
 * Author: Azamat Mirvosiqov
 * Date: 7/28/19
 * Time: 2:31 AM
 */

namespace backend\controllers;

use common\models\Users;
use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

class Controller extends \yii\web\Controller
{
    public $minimumRole = Users::ROLE_CONTENT_MANAGER;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (Yii::$app->user->identity['role'] == Users::ROLE_USER) {
            Yii::$app->user->logout();
            $this->redirect(['/']);
            return false;
        }

        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->getUserLevel() < Yii::$app->user->identity->getRoleId($this->minimumRole))
            throw new NotFoundHttpException('Page not found');

        return parent::beforeAction($action);
    }
}