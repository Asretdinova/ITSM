<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VoteResult */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vote-result-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'second')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'second_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'third_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
