<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TeamInfo */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Руководство', 'url' => ['heads/view', 'id' => $member_id]];
$this->params['breadcrumbs'][] = ['label' => 'Информация', 'url' => ['index', 'member_id' => $member_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
