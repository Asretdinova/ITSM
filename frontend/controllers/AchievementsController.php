<?php


namespace frontend\controllers;

use common\models\Achievements;

class AchievementsController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'mainNoContent';

        $model = Achievements::find()->orderBy(['date' => SORT_DESC])->all();
        return $this->render('index', [
            'model' => $model
        ]);
    }
}
