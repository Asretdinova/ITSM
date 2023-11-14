<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Карточки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="action-cards-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'attribute' => 'page_code',
                'value' => function ($model) {
                    return @$model->page->title_ru;
                }
            ],
            'card_id',
            [
                'attribute' => 'image',
                'value' => function ($model) {
                    return Html::img(
                        "{$model->base_url}/uploads/{$model->image}.png",
                        ['width' => 70]
                    );
                },
                'format' => 'raw'
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}'
            ],
        ],
    ]); ?>


</div>
