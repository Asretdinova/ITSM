<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AppDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'goal_ru') ?>

    <?= $form->field($model, 'goal_uz') ?>

    <?= $form->field($model, 'goal_en') ?>

    <?= $form->field($model, 'result_ru') ?>

    <?php // echo $form->field($model, 'result_uz') ?>

    <?php // echo $form->field($model, 'result_en') ?>

    <?php // echo $form->field($model, 'screen') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
