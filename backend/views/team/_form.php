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
        '' => '',
        Team::CATEGORY_DEPARTMENT_HEAD => 'Начальник отдела',
    ]) ?>

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_id')->dropDownList(
            \common\models\Departments::fetchData()
    ) ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>
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
