<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\VideogallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Videogalleries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="videogallery-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Videogallery', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'category_id',
                'label'=>'Category Name',
                'value' => function ($data) {
                    return \common\models\Videocategory::findOne(['id'=>$data->category_id])->title_en;
                },
            ],
//            'title_uz',
//            'title_ru',
            'title_en',
            'date',
            //'seen',
            'video',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
