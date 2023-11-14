<?php
namespace frontend\controllers;

use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'mainPage';

        return $this->render('index');
    }

    public function actionDigitalServices()
    {
        $this->layout = 'empty';

        return $this->render('digitalServices');
    }

    public function actionConceptDevelopment()
    {
        $this->layout = 'empty';

        return $this->render('conceptDevelopment');
    }

    public function actionLogisticsAndEvents()
    {
        $this->layout = 'empty';

        return $this->render('logisticsAndEvents');
    }

    public function actionMedia()
    {
        $this->layout = 'empty';

        return $this->render('media');
    }

    public function actionHr()
    {
        $this->layout = 'empty';

        return $this->render('hr');
    }
}
