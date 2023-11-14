<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EduKids */

$this->title = 'Редактировать Edu Kids: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Edu Kids', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="edu-kids-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
