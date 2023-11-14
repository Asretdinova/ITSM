<?php

/**
 * Created by PhpStorm.
 * Author: Azamat Mirvosiqov
 * Date: 11/8/19
 * Time: 5:46 AM
 */

namespace frontend\controllers;

use frontend\models\ApplicationForm;
use Yii;
use common\models\Jobs;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class JobsController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'titleBanner';

        $model = Jobs::find()->where(['is_active' => true])->all();

        return $this->render('index', [
            'model' => $model
        ]);
    }

    public function actionView($id)
    {
        $model = Jobs::find()->where(['is_active' => true, 'id' => $id])->one();

        /* @var $appForm ApplicationForm */
        $appForm = new ApplicationForm();
        if ($appForm->load(Yii::$app->request->post())) {
            Yii::$app->session->setFlash('success', Yii::t('main', 'Спасибо! Ваше сообщение успешно отправлено. Мы свяжемся с вами в самое ближайшее время'));
            $appForm->cv = UploadedFile::getInstance($appForm, 'cv');
            $appForm->send();
            $appForm = new $appForm();
        }

        if (!$model)
            throw new NotFoundHttpException(Yii::t('main', 'Страница не найдена'));

        return $this->render('view', [
            'model' => $model,
            'appForm' => $appForm,
        ]);
    }
}