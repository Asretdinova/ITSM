<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TeamInfo */

$this->title = 'Редактировать: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Руководство', 'url' => ['heads/view', 'id' => $member_id]];
$this->params['breadcrumbs'][] = ['label' => 'Информация', 'url' => ['index', 'member_id' => $member_id]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="team-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
