<?php

use common\models\Departments;
use common\models\ProjectCustomer;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\ckeditor\CKEditor;
use common\models\ProjectsCategory;
use common\models\ProjectType;
use kartik\datetime\DateTimePicker;
use kartik\file\FileInput;


/* @var $this yii\web\View */
/* @var $model common\models\Content */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile(Yii::getAlias("@web/ckeditor/ckeditor.js"));
$js = <<<JS
    CKEDITOR.replace('content-content_ru');
    CKEDITOR.replace('content-content_uz');
    CKEDITOR.replace('content-content_en');
    CKEDITOR.replace('content-content2_ru');
    CKEDITOR.replace('content-content2_uz');
    CKEDITOR.replace('content-content2_en');
    CKEDITOR.replace('content-content3_ru');
    CKEDITOR.replace('content-content3_uz');
    CKEDITOR.replace('content-content3_en');
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
            
            $('#content-images_list').val(JSON.stringify(data));
            
            e.currentTarget.submit();
        });
        
        $('.photoBoxList .photoBox .cancelBtn').click(function(e) {
            e.preventDefault();
                        
            $(this).parent().remove();
        });
    })
");
?>

<div class="content-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'id' => 'galForm'
    ]); ?>
    <div class="col-md-6 ">
    <?= $form->field($model, 'category_id')->dropDownList(\common\models\ProjectsCategory::fetchData()) ?>
    </div>
    <div class="col-md-6 ">
    <?= $form->field($model, 'department_id')->dropDownList(ArrayHelper::map(Departments::find()->all(),'id','title_ru')) ?>
    </div>
    <div class="col-md-6 ">
    <?= $form->field($model, 'project_customer_id')->dropDownList(ArrayHelper::map(ProjectCustomer::find()->all(),'id','title_ru')) ?>
    </div>
    <div class="col-md-6 ">
    <?= $form->field($model, 'project_type_id')->dropDownList(ArrayHelper::map(ProjectType::find()->all(),'id','title_ru')) ?>
    </div>

   <div>
    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_title_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_ru')->textarea() ?>

    <?= $form->field($model, 'content_uz')->textarea() ?>

    <?= $form->field($model, 'content_en')->textarea() ?>

    <?= $form->field($model, 'content2_ru')->textarea() ?>

    <?= $form->field($model, 'content2_uz')->textarea() ?>

    <?= $form->field($model, 'content2_en')->textarea() ?>

    <?= $form->field($model, 'content3_ru')->textarea() ?>

    <?= $form->field($model, 'content3_uz')->textarea() ?>

    <?= $form->field($model, 'content3_en')->textarea() ?>

    <?= $form->field($model, 'web_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ios_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
            'pluginOptions' => [
              'autoclose' => true,
              'format' => 'yyyy-mm-dd'
            ]
          ]) ?>
</div>
    <?= $form->field($model, 'file')->fileInput() ?>
    <?= $form->field($model, 'logo')->fileInput() ?>
    <?= $form->field($model, 'main_image')->fileInput() ?>
    <?= $form->field($model, 'video')->fileInput() ?>
   
    <?= $form->field($model, 'images_list')->hiddenInput() ?>
    <?= \common\modules\fileUploader\widgets\GalleryUploaderUploader::widget([
        'name' => 'photos',
        'initDataParams' => (!empty($model->images_list)) ? json_decode($model->images_list) : null,
    ]) ?>
    <div class="col-md-6 ">

    <?= $form->field($model, 'status')->dropDownList([
        ProjectsCategory::STATUS_PROCESS => 'Проекты в разработке',
        ProjectsCategory::STATUS_PROCESSED => 'Завершенные проекты',
    ]) ?>
    </div>
    <div class="col-md-6 ">

    <?= $form->field($model, 'is_active')->dropDownList([
        '1' => 'Активен',
        '0' => 'Неактивен',
    ]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
