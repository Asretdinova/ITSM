<?php

/* @var $jobId integer */

/* @var $appForm \frontend\models\ApplicationForm */

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\widgets\Pjax;

$js = <<<JS
    $(document).on('pjax:send', function() {
      $('#loading').show();
    }).on('pjax:complete', function() {
      $('#loading').hide()
    })
JS;

$this->registerJs($js, \yii\web\View::POS_READY);

Modal::begin([
    'id' => 'applicationModal',
]);

echo "
    <div id='loading' class='form_loading'>
        <h1>". Yii::t('main', 'Подождите пожалуйста') ."...</h1>
    </div>
";

Pjax::begin(['id' => 'applicationForm']);

if (Yii::$app->session->hasFlash('success')) {
    echo "
        <div class='alert alert-success alert-dismissible' role='alert'>
            " . Yii::$app->session->getFlash('success') . "
        </div>
    ";
}

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'data-pjax' => true]]);

echo Html::tag('h1', Yii::t('main', 'Заполните форму'));

echo $form->field($appForm, 'fullName')->textInput(['maxlength' => true]);

echo $form->field($appForm, 'email')->textInput(['maxlength' => true]);

echo $form->field($appForm, 'phone')
    ->widget(MaskedInput::className(), [
        'mask' => '+\9\98 99 999-99-99',
        'options' => [
            'placeholder' => Yii::t('main', 'Телефон'),
        ]
    ]);

echo $form->field($appForm, 'cv')->fileInput();

echo $form->field($appForm, 'job_id')->hiddenInput(['value' => $jobId])->label(false);

echo Html::submitButton(Yii::t('main', 'Отправить резюме'), ['class' => 'actionButton orange right']);

echo Html::tag('div', null, ['class' => 'clearfix']);
ActiveForm::end();
Pjax::end();

Modal::end();
?>

<button class="actionButton orange pull-center" data-toggle="modal" data-target="#applicationModal">
    <?= yii::t('main', 'Отправить резюме') ?>
</button>
