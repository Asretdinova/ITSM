<?php

/**
 * Created by PhpStorm.
 * Author: Azamat Mirvosiqov
 * Date: 11/8/19
 * Time: 6:37 AM
 */

/* @var $this \yii\web\View */
/* @var $model \common\models\Jobs */
/* @var $appForm \frontend\models\ApplicationForm */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'О нас'), 'url' => ['/page/about']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Вакансии'), 'url' => ['/jobs/index']];
$this->params['breadcrumbs'][] = $this->title;

echo \yii\helpers\Html::tag('p', $this->title, ['class' => 'mini_title']);

echo \yii\helpers\Html::tag('p', $model->apps, [
    'class' => 'violetColor'
]);

echo $model->description;

echo $this->render('_applyForm', [
    'jobId' => $model->id,
    'appForm' => $appForm
]);