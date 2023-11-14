<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Achievements */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile(Yii::getAlias("@web/ckeditor/ckeditor.js"));
$js = <<<JS
    CKEDITOR.replace('achievements-content_ru');
    CKEDITOR.replace('achievements-content_uz');
    CKEDITOR.replace('achievements-content_en');
    
    function checkState() {
        if ($('#has_content:checked').length > 0) {
            $('#content_div').show();
            $('#url_div').hide();
        } else {
            $('#content_div').hide();
            $('#url_div').show();
        }
    }
    
    $('#has_content').change(function() {
        checkState();
    });
    
    checkState();
JS;
$this->registerJs($js, \yii\web\View::POS_READY);

?>

<div class="Достижении-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_uz')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->widget(\kartik\date\DatePicker::classname(), [
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]) ?>

    <hr>
    <?= $form->field($model, 'has_content')->checkbox(['id' => 'has_content']) ?>
    <hr>

    <div id="content_div">
        <?= $form->field($model, 'content_ru')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'content_uz')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'content_en')->textarea(['rows' => 6]) ?>
    </div>

    <div id="url_div">
        <?= $form->field($model, 'url')->textInput() ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
