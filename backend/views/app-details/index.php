<?php

use common\models\AppDetails;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AppDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Детализация проектов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'screen',
                'value' => function ($model) {
                    return Html::img(
                        "{$model->base_url}/uploads/content/{$model->screen}.jpg",
                        ['width' => 200]
                    );
                },
                'format' => 'raw'
            ],
            'goal_ru:ntext',
            'result_ru:ntext',
            'order',
            [
                'attribute' => 'category_id',
                'filter' => AppDetails::categories(),
                'value' => function($model) {
                    return AppDetails::categories($model->category_id);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
