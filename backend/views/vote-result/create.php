<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VoteResult */

$this->title = 'Добавить Vote Result';
$this->params['breadcrumbs'][] = ['label' => 'Vote Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vote-result-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
