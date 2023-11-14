<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\References */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="references-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'review_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'review_uz')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'review_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'order')->textInput([
        'type' => 'number'
    ]) ?>

    <?= $form->field($model, 'is_active')->dropDownList([
        '1' => 'Активен',
        '0' => 'Неактивен',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
