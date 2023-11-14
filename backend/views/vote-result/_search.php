<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VoteResultSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vote-result-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'first') ?>

    <?= $form->field($model, 'first_comment') ?>

    <?= $form->field($model, 'second') ?>

    <?= $form->field($model, 'second_comment') ?>

    <?php // echo $form->field($model, 'third_comment') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сброс', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
