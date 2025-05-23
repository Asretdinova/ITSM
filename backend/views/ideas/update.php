<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ideas */

$this->title = 'Редактировать идею: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Идеи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="ideas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
