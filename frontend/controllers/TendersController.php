<?php

namespace frontend\controllers;

use common\models\Tenders;
use Yii;

class TendersController extends Controller
{
    public function actionIndex()
    {
        $model = Tenders::find()->orderBy(['date' => SORT_DESC])->all();

        return $this->render('index', [
            'model' => $model
        ]);
    }
}