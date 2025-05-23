<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AppDetails */

$this->title = 'Изменит детализацию проектов';
$this->params['breadcrumbs'][] = ['label' => 'App Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="app-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
