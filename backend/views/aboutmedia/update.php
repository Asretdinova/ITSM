<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Aboutmedia */

$this->title = 'Update Aboutmedia: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Aboutmedia', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aboutmedia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
