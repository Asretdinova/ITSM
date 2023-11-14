<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Content */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="content-view">

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
            'title_ru',
            'sub_title_ru:html',
            'content_ru:html',
            'content2_ru:html',
            'content3_ru:html',

            'date',
            [
                'attribute' => 'image_id',
                'value' => function ($model) {
                    return Html::img(
                        "{$model->base_url}/uploads/{$model->image_id}.jpg",
                        ['width' => 200]
                    );
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'main_image_id',
                'value' => function ($model) {
                    return Html::img(
                        "{$model->base_url}/uploads/{$model->main_image_id}.png",
                        ['width' => 200]
                    );
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'logo_id',
                'value' => function ($model) {
                    return Html::img(
                        "{$model->base_url}/uploads/{$model->logo_id}.png",
                        ['width' => 200]
                    );
                },
                'format' => 'raw'
            ]
          
        ],
    ]) ?>

</div>
