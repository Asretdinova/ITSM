<?php

/* @var $searchModel backend\models\IdeasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use backend\models\IdeasSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\widgets\Pjax;


Pjax::begin();

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'author_name',
        'author_surname',
        'mail',
        'idea_id',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view}'
        ],
    ],
]);

Pjax::end();