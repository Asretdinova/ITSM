<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile(Yii::getAlias("@web/ckeditor/ckeditor.js"), [
    'depends' => [\yii\web\JqueryAsset::className()]
]);

$js = <<<JS
    CKEDITOR.replace('pages-content_ru');
    CKEDITOR.replace('pages-content_uz');
    CKEDITOR.replace('pages-content_en');
JS;
$this->registerJs($js, \yii\web\View::POS_READY);

$this->registerJs("
    $('document').ready(function() {
        $('#galForm').submit(function(e) {
            e.preventDefault();
            
            var data = [];
            $.each($('.photoBoxList .photoBox'), function( index, element ) {
                var guid = $(element).attr('data-name');
                
                if(data.indexOf(guid) === -1) {
                    data.push(guid);
                }
            });
            
            $('#pages-images_list').val(JSON.stringify(data));
            
            e.currentTarget.submit();
        });
        
        $('.photoBoxList .photoBox .cancelBtn').click(function(e) {
            e.preventDefault();
                        
            $(this).parent().remove();
        });
    })
");

?>

<div class="pages-form">

    <?php $form = ActiveForm::begin([
        'id' => 'galForm'
    ]); ?>

    <?= $form->field($model, 'code_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_ru')->textarea() ?>

    <?= $form->field($model, 'content_uz')->textarea() ?>

    <?= $form->field($model, 'content_en')->textarea() ?>

    <?= $form->field($model, 'images_list')->hiddenInput() ?>
    <?= \common\modules\fileUploader\widgets\GalleryUploaderUploader::widget([
        'name' => 'photos',
        'initDataParams' => (!empty($model->images_list)) ? json_decode($model->images_list) : null,
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
