<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EduKids */

$this->title = 'Добавить Edu Kids';
$this->params['breadcrumbs'][] = ['label' => 'Edu Kids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-kids-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
