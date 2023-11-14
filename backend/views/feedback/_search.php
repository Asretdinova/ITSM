<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FeedbackSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feedback-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'full_name') ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'mail') ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'phone') ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'text') ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
