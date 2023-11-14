<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ideas */

$this->title = 'Добавить идею';
$this->params['breadcrumbs'][] = ['label' => 'Идеи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ideas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
