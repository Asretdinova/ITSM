<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AppDetails */

$this->title = 'Добавить детализацию проектов';
$this->params['breadcrumbs'][] = ['label' => 'App Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
