<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VoteResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vote Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vote-result-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'first',
                'label' => 1
            ],
            [
                'attribute' => 'first_comment',
                'label' => '1 comment',
                'format' => 'text'
            ],
            [
                'attribute' => 'second',
                'label' => 2
            ],
            [
                'attribute' => 'second_comment',
                'label' => '2 comment',
                'format' => 'text'
            ],
            [
                'attribute' => 'third_comment',
                'label' => 3,
                'format' => 'text'
            ],
            'date',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],
        ],
    ]); ?>


</div>
