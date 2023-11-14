<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\DetailView;
use common\models\Ideas;

/* @var $this yii\web\View */
/* @var $model common\models\Ideas */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Идеи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ideas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        switch ($model->status) {
            case Ideas::STATUS_NEW:
                echo Html::a('Принять на рассмотрение', ['accept', 'id' => $model->id], ['class' => 'btn btn-primary']);
                echo ' ';
                echo Html::a('Аннулировать', ['cancel', 'id' => $model->id], ['class' => 'btn btn-danger']);
                break;

            case Ideas::STATUS_PROCESS:
                echo Html::a('Принять', ['publish', 'id' => $model->id], ['class' => 'btn btn-success']);
                echo ' ';
                echo Html::a('Отклонить', ['reject', 'id' => $model->id], ['class' => 'btn btn-danger']);
                break;

            case Ideas::STATUS_PUBLISHED:
                echo Html::a('Отклонить', ['reject', 'id' => $model->id], ['class' => 'btn btn-danger']);
                break;

            case Ideas::STATUS_REJECTED:
                echo Html::a('Принять', ['publish', 'id' => $model->id], ['class' => 'btn btn-success']);
                break;

            case Ideas::STATUS_ANNULLED:
                echo Html::a('Принять на рассмотрение', ['accept', 'id' => $model->id], ['class' => 'btn btn-primary']);
                break;
        }

        //        if (!$model->is_active)
        //            echo Html::a('Принять', ['publish', 'id' => $model->id], ['class' => 'btn btn-primary']);
        //        else
        //            echo Html::a('Отменить публикацию', ['publish', 'id' => $model->id], ['class' => 'btn btn-danger']);
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return Ideas::getStatusDefinition($model->status);
                },
//                'filter' => Ideas::getStatusDefinition('all'),
            ],

            'title',
            'text:ntext',
            'mail',
            'phone',
            'implementation:ntext',
            'expediency:ntext',
            'author_name',
            'author_surname',
            'date',
            'likes',
            'views',
            [
                'attribute' => 'accept_publishing',
                'value' => function($model) {
                    return ($model->accept_publishing) ? 'Да' : 'Нет';
                }
            ],
            [
                'attribute' => 'accept_participating',
                'value' => function($model) {
                    return ($model->accept_participating) ? 'Да' : 'Нет';
                }
            ],
            'category_id',
            [
                'attribute' => 'reason',
                'value' => function ($model) {
                    return $model->reason;
                },
            ],
            [
                'attribute' => 'file',
                'value' => function ($model) {
                    return Html::a("Скачать", "{$model->base_idea_url}/uploads/files/{$model->file}");
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'user_details',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::tag('pre', Json::encode(json_decode($model->user_details, true), JSON_PRETTY_PRINT));
                }
            ],
        ],
    ]) ?>

</div>
