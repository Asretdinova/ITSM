<?php

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Comments */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if (!$model->is_active)
            echo Html::a('Опубликовать', ['publish', 'id' => $model->id], ['class' => 'btn btn-primary']);
        else
            echo Html::a('Отменить публикацию', ['publish', 'id' => $model->id], ['class' => 'btn btn-danger']);
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'author_name',
            'author_surname',
            'mail',
            'comment:ntext',
            'date',
            'idea_id',
            [
                'attribute' => 'is_active',
                'value' => function ($model) {
                    return ($model->is_active) ? 'Опубликованный' : 'Неопубликованный';
                }
            ],
            [
                'attribute' => 'user_details',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::tag('pre', Json::encode(json_decode($model->user_details, true), JSON_PRETTY_PRINT));
                }
            ],
        ],
    ]) ?>

</div>
