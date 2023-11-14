<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProjectType */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile(Yii::getAlias("@web/ckeditor/ckeditor.js"), [
    'depends' => [\yii\web\JqueryAsset::className()]
]);

$js = <<<JS
    CKEDITOR.replace('project-type-description_ru');
    CKEDITOR.replace('project-type-description_uz');
    CKEDITOR.replace('project-type-description_en');
JS;
$this->registerJs($js, \yii\web\View::POS_READY);
?>

<div class="project-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_uz')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model,'file')->fileInput() ?>

    <?= $form->field($model,'banner')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
