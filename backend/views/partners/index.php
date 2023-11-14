<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PartnersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Партнёры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="org-links-index">

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
                'attribute' => 'logo',
                'value' => function ($model) {
                    return Html::img(
                        "{$model->base_url}/uploads/content/{$model->logo}",
                        ['height' => 100]
                    );
                },
                'format' => 'raw'
            ],
            'title_ru',
            'url:url',
            [
                'attribute' => 'is_active',
                'filter' => [
                    1 => 'Международный',
                    0 => 'Местный',
                ],
                'value' => function ($model) {
                    return ($model->is_active) ? 'Международный' : 'Местный';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
