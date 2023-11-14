<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-customer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Project Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title_ru',
            'title_uz',
            'title_en',
            'description_ru:ntext',
            //'description_uz:ntext',
            //'description_en:ntext',
            //'image_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
