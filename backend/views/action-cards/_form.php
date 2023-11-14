<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ActionCards */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="action-cards-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'page_code')->dropDownList(
            \yii\helpers\ArrayHelper::map(\common\models\Pages::find()->all(), 'code_name', 'title_ru')
    ) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'about_ru')->textInput() ?>

    <?= $form->field($model, 'about_uz')->textInput() ?>

    <?= $form->field($model, 'about_en')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
