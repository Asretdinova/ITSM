<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Achievements */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Достижении', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="Достижении-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'image',
                'value' => function ($model) {
                    return Html::img(
                        "{$model->base_url}/uploads/{$model->image}.jpg",
                        ['width' => 300]
                    );
                },
                'format' => 'raw'
            ],
            'description_ru:ntext',
            'description_uz:ntext',
            'description_en:ntext',
            'has_content',
            'content_ru:ntext',
            'content_uz:ntext',
            'content_en:ntext',
            'url:ntext',
            'date',
        ],
    ]) ?>

</div>
