<?php

/* @var $searchModel backend\models\IdeasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use common\models\Ideas;
use yii\grid\GridView;
use yii\widgets\Pjax;

Pjax::begin();

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'title',
        [
            'attribute' => 'author_name',
            'options' => [
                'style' => 'min-width: 70px;'
            ]
        ],
        [
            'attribute' => 'author_surname',
            'options' => [
                'style' => 'min-width: 70px;'
            ]
        ],
        'likes',
        'views',
        [
            'attribute' => 'category_id',
            'value' => function ($model) {
                return @$model->category->title;
            },
            'options' => [
                'style' => 'min-width: 100px;'
            ]
        ],

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view}'
        ],
    ],
]);

Pjax::end();