<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TeamInfo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Руководство', 'url' => ['heads/view', 'id' => $member_id]];
$this->params['breadcrumbs'][] = ['label' => 'Информация', 'url' => ['index', 'member_id' => $member_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="team-info-view">

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
            'member_id',
            'title_ru',
            'title_uz',
            'title_en',
            'description_ru:ntext',
            'description_uz:ntext',
            'description_en:ntext',
            'order',
            'date',
        ],
    ]) ?>

</div>
