<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AchievementsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Достижении';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Достижении-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'image',
                'value' => function ($model) {
                    return Html::img(
                        "{$model->base_url}/uploads/{$model->image}.jpg",
                        ['width' => 150]
                    );
                },
                'format' => 'raw'
            ],
            'description_ru:ntext',
//            'description_uz:ntext',
//            'description_en:ntext',
//            'has_content',
            'content_ru:ntext',
            //'content_uz:ntext',
            //'content_en:ntext',
            //'url:ntext',
            'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
