<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EduKidsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Edu Kids';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-kids-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить Edu Kids', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Категории', ['edu-kids-category/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'thumb',
                'value' => function ($model) {
                    return Html::img(
                        "{$model->base_url}/{$model->thumb}",
                        ['width' => 200]
                    );
                },
                'format' => 'raw'
            ],
            'title_ru',
            'date',
//            'is_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
