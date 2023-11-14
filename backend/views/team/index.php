<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Команда';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отделы', ['/departments'], ['class' => 'btn btn-warning']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'photo',
                'value' => function ($model) {
                    return Html::img(
                        "{$model->base_url}/uploads/content/{$model->photo}.jpg",
                        ['width' => 150]
                    );
                },
                'format' => 'raw'
            ],
            'name_ru',
            [
                'attribute' => 'department_id',
                'value' => function($model) {
                    $department = \common\models\Departments::find()->where(['id' => $model->department_id])->one();
                    if (!$department)
                        return $model->department_id;

                    return $department->title_ru;
                }
            ],
            'order',
            'is_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
