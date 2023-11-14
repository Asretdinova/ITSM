<?php

/**

 * Date: 8/24/19
 * Time: 1:47 AM
 */


use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model \common\models\Feedback */
/* @var $form yii\widgets\ActiveForm */


$js = <<<JS
    $(document).on('pjax:send', function() {
      $('#loading').show();
    }).on('pjax:complete', function() {
      $('#loading').hide()
    })
JS;

$this->registerJs($js, \yii\web\View::POS_READY);
?>

<div class="feedback-form">
    <div id="loading" class="form_loading">
        <h1><?= Yii::t('main', 'Подождите пожалуйста') ?>...</h1>
    </div>


    <h3><?= Yii::t('main', 'Написать комментарий')?></h3>

    <?php Pjax::begin(['id' => 'feedback']) ?>
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]]); ?>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible text-left" role="alert">
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'author_name')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'author_surname')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6, 'maxlength' => true]) ?>

    <?= $form->field($model, 'reCaptcha')->widget(
        \himiklab\yii2\recaptcha\ReCaptcha2::className(), [ 'data-sitekey' => '6LedSQIaAAAAAL6ZzgGinX8-XNEjwa6qBSHdWoWj']
    )->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Отправить'), [
            'class' => 'form_send_btn'
        ]) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
<?php Pjax::end(); ?>
