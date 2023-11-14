<?php

/**
 * Created by PhpStorm.
 * Author: Mamura Asretddinova
 * Date: 18/09/20
 * Time: 11:52 AM
 */

namespace frontend\controllers;

use Yii;
use common\models\Documents;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class DocumentsController extends Controller
{
    public function actionIndex()
    {
        $model = Documents::find()->all();
        return $this->render('index', [
            'model' => $model
        ]);
    }


}