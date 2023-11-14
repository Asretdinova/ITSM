<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Partners */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Партнёры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="org-links-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
