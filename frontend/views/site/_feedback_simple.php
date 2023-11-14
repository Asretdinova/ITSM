<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model \common\models\Feedback */
/* @var $form yii\widgets\ActiveForm */
/* @var $simpleForm boolean */


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

    <?php Pjax::begin(['id' => 'feedbackForm']) ?>
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]]); ?>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12">
            <?= $form
                ->field($model, 'full_name')
                ->textInput([
                    'maxlength' => true,
                    'placeholder' => mb_strtoupper(Yii::t('main', 'Ваше имя')),
                    'class' => '',
                ])
                ->label(false)
            ?>

            <?= $form
                ->field($model, 'mail')
                ->textInput([
                    'maxlength' => true,
                    'placeholder' => mb_strtoupper(Yii::t('main', 'E-mail')),
                    'class' => '',
                ])
                ->label(false)
            ?>

            <?= $form
                ->field($model, 'phone')
                ->widget(MaskedInput::className(), [
                    'mask' => '+\9\98 99 999-99-99',
                    'options' => [
                        'placeholder' => mb_strtoupper(Yii::t('main', 'Телефон')),
                        'class' => '',
                    ]
                ])
                ->label(false)
            ?>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton(Yii::t('main', 'Отправить'), [
                    'class' => 'pull-center actionButton orange wide'
                ]) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>
</div>
