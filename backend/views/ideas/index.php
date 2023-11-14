<?php

use common\models\Ideas;
use yii\bootstrap\Tabs;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\IdeasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $dataProviderForUnpublished yii\data\ActiveDataProvider */
/* @var $dataProviderForAnnulled yii\data\ActiveDataProvider */

$this->title = 'Идеи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ideas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Новые',
                'content' => GridView::widget([
                    'dataProvider' => $dataProviderForUnpublished,
                    'columns' => [
                        [
                            'attribute' => 'id',
                            'options' => [
                                'style' => 'min-width: 50px;'
                            ]
                        ],
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
                ]),
                'active' => true
            ],
            [
                'label' => 'Аннулированные',
                'content' => $this->render('_annulled', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProviderForAnnulled,
                ])
            ],
            [
                'label' => 'Обработанные',
                'content' => $this->render('_content', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ])
            ]
        ]
    ])
    ?>


</div>
