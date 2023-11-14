<?php

namespace idea\controllers;

use common\models\Categories;
use common\models\Ideas;
use idea\models\IdeaForm;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

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
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'mainPage';

        $categories = Categories::find()->where(['is_active' => true])->all();

        $idea = new IdeaForm();
        if ($idea->load(Yii::$app->request->post())) {
            $idea->presentation = UploadedFile::getInstance($idea, 'presentation');

            if ($idea->upload() && $idea->save()) {
                Yii::$app->session->setFlash('success', Yii::t('main', 'Спасибо! Ваша идея успешно отправлена. Она будет опубликована после проверки модератором!'));
                $idea = new IdeaForm();
            } else {
                $idea->addError('file', Yii::t('main', 'Ошибка загрузки файла'));
            }
        }

        $recentIdeas = Ideas::find()
            ->andWhere(['is_active' => true])
            ->orderBy(['date' => SORT_DESC])
            ->limit(3)
            ->all();

        $popularIdeas = Ideas::find()
            ->andWhere(['is_active' => true])
            ->orderBy(['likes' => SORT_DESC, 'views' => SORT_DESC])
            ->limit(3)
            ->all();

        $model = new Ideas();

        return $this->render('index', [
            'categories' => $categories,
            'recentIdeas' => $recentIdeas,
            'popularIdeas' => $popularIdeas,
            'idea' => $idea,
            'model' => $model,
        ]);
    }

    public function actionHowItWorks()
    {
        $this->layout = 'blank';

        $model = new IdeaForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('main', 'Спасибо! Ваше идея успешно отправлено. Мы свяжемся с вами в самое ближайшее время'));
            $model = new IdeaForm();
        }

        return $this->render('how-it-vorks', [
            'model' => $model,
        ]);
    }
}
