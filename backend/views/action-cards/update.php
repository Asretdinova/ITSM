<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ActionCards */

$this->title = 'Редактировать карточку: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Карточки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="action-cards-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
