<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GalleryCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории галереи';
$this->params['breadcrumbs'][] = ['label' => 'Галерея', 'url' => ['gallery/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title_ru',
            'date',
            //'is_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
