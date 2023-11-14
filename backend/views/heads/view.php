<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Team */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Руководство', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="team-view">

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

        <?= Html::a('Info', ['/team-info', 'member_id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Remove photo', ['remove-image', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
            'name_uz',
            'name_en',
            'position_ru',
            'position_uz',
            'position_en',
            'order',
            'is_active',
        ],
    ]) ?>

</div>
