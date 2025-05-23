<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tenders */

$this->title = 'Редактировать тендеры: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Тендеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="tenders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
