<?php

use common\models\Team;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Team */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="team-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'category')->dropDownList([
        Team::CATEGORY_HEAD => 'Директор',
        Team::CATEGORY_MANAGER => 'Зам.',
    ]) ?>

    <hr>

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <hr>

    <?= $form->field($model, 'position_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position_en')->textInput(['maxlength' => true]) ?>

    <hr>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>

    <div class="receptionDays">
        <?= $form->field($model, 'reception_days_ru')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'reception_days_uz')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'reception_days_en')->textInput(['maxlength' => true]) ?>
    </div>

    <hr>

    <?php
    if (is_object($model->projects_list))
        $model->projects_list = [];

    echo $form->field($model, 'projects_list')->widget(\kartik\select2\Select2::classname(), [
        'data' => \common\models\Content::fetchProjectsList(),
        'options' => [
            'multiple' => true
        ]
    ]) ?>

    <hr>

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
