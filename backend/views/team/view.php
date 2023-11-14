<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Team */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Команда', 'url' => ['index']];
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
        ],
    ]) ?>

</div>
