<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tenders */

$this->title = 'Добавить тендеры';
$this->params['breadcrumbs'][] = ['label' => 'Тендеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tenders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
