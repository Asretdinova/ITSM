<?php

use yii\bootstrap\Tabs;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $dataProviderForUnpublished yii\data\ActiveDataProvider */

$this->title = 'Комментарии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Неопубликованные',
                'content' => GridView::widget([
                    'dataProvider' => $dataProviderForUnpublished,
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
                ]),
                'active' => true
            ],
            [
                'label' => 'Опубликованные',
                'content' =>  $this->render('_content', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ])
            ]
        ]
    ])
    ?>

</div>
