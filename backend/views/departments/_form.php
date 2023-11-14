<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Departments */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile(Yii::getAlias("@web/ckeditor/ckeditor.js"), [
    'depends' => [\yii\web\JqueryAsset::className()]
]);

$js = <<<JS
    CKEDITOR.replace('departments-description_ru');
    CKEDITOR.replace('departments-description_uz');
    CKEDITOR.replace('departments-description_en');
JS;
$this->registerJs($js, \yii\web\View::POS_READY);
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_uz')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

    <?php
    if (is_object($model->projects_list))
        $model->projects_list = [];

    echo $form->field($model, 'projects_list')->widget(\kartik\select2\Select2::classname(), [
        'data' => \common\models\Content::fetchProjectsList(),
        'options' => [
            'multiple' => true
        ]
    ]) ?>
    <?= $form->field($model, 'order')->textInput(['type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
