<?php

use common\models\AppDetails;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\AppDetails */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="app-details-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'project_id')->widget(Select2::classname(), [
        'data' => \common\models\Content::fetchProjectsList(),
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'goal_ru')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'goal_uz')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'goal_en')->textarea(['rows' => 3]) ?>

    <hr>
    <hr>

    <?= $form->field($model, 'result_ru')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'result_uz')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'result_en')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'order')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'category_id')->dropDownList(AppDetails::categories()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
