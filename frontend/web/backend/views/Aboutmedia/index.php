<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AboutmediaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aboutmedia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aboutmedia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Aboutmedia', ['create'], ['class' => 'btn btn-success']) ?>
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
            'content_ru:ntext',
            //'content_uz:ntext',
            //'content_en:ntext',
            //'date',
            //'image_id',
            //'category_id',
            //'type',
            //'is_active',
            //'viewed',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
