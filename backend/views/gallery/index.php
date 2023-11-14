<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Галерея';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить фотографию', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Категории', ['gallery-category/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'image',
                'value' => function ($model) {
                    return Html::img(
                        "{$model->base_url}/uploads/gallery/thumbs/{$model->image}.jpg",
                        ['width' => 200]
                    );
                },
                'format' => 'raw'
            ],
            'title_ru',
            [
                'attribute' => 'category_id',
                'filter' => \common\models\GalleryCategory::fetchData(),
                'value' => function($model) {
                    return ($model->category) ? $model->category->title_ru : $model->category_id;
                }
            ],
            //'date',
            //'is_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
