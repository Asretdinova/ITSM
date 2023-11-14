<?php
/* @var $this \yii\web\View */
/* @var $process \common\models\Content */
/* @var $processed \common\models\Content */

use yii\bootstrap\Tabs;
use yii\helpers\Html;


echo Html::beginTag('div', ['class' => 'projects']);

echo Html::tag('h1', Yii::t('main', 'Наши проекты'), [
    'class' => 'boldTitle center white'
]);

echo Html::tag('h2', Yii::t('main', 'Будущее за инновациями!'));

echo Tabs::widget([
    'options' => [
        'class' => 'projects_tabs'
    ],
    'items' => [
        [
            'label' => '<i class="fas fa-check"></i> ' . Yii::t('main', 'Завершенные проекты'),
            'content' => $this->render('_projects_list', ['model' => $processed]),
            'active' => true,
            'encode' => false
        ],
        [
            'label' => '<i class="fas fa-sync"></i> ' . Yii::t('main', 'Проекты в разработке'),
            'content' => $this->render('_projects_list', ['model' => $process]),
            'encode' => false
        ],
    ],
]);

echo Html::a(Yii::t('main', 'Все проекты'), ['/projects/index'], [
    'class' => 'actionButton bordered orange'
]);


echo Html::endTag('div');
