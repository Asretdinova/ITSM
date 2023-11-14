<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AppDetails */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Детализация проектов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="app-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'goal_ru:ntext',
            'goal_uz:ntext',
            'goal_en:ntext',
            'result_ru:ntext',
            'result_uz:ntext',
            'result_en:ntext',
            'screen',
            'order',
            'category_id',
        ],
    ]) ?>

</div>
