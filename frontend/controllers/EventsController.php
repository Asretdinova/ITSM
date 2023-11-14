<?php

/**
 * Created by PhpStorm.
 * Author: Azamat Mirvosiqov
 * Date: 7/28/19
 * Time: 4:15 PM
 */

namespace frontend\controllers;

use Yii;
use common\models\Content;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class EventsController extends Controller
{
    public $type = 'events';

    public function beforeAction($action)
    {
        $this->redirect(['press-releases/index']);
        return false;
    }

    public function actionIndex()
    {
        $this->layout = 'mainDark';

        $dataProvider = new ActiveDataProvider([
            'query' => Content::find()
                ->where(['is_active' => true, 'type' => $this->type])
                ->orderBy(['date' => SORT_DESC, 'id' => SORT_DESC]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = Content::find()->where(['id' => $id, 'is_active' => true, 'type' => $this->type])->one();

        if ($model)
            return $this->render('view', [
                'model' => $model,
            ]);
        else
            throw new NotFoundHttpException();
    }
}