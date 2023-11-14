<?php

/* @var $this \yii\web\View */

/* @var $showResult boolean */
/* @var $data array */

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

Modal::begin([
    'id' => 'voteModal',
]);

echo '
    <div id="loading" class="form_loading">
        <h2>' . Yii::t("main", "Подождите пожалуйста") . '...</h2>
    </div>
';

Pjax::begin(['id' => 'voteJax']);
$form = ActiveForm::begin([
    'id' => 'voteForm',
    'options' => ['data-pjax' => true]
]);

echo Html::tag('h1', Yii::t('main', 'ОПРОСНИК ПО ОРГАНИЗАЦИИ КОНКУРСА «САМЫЙ ЛУЧШИЙ УЧИТЕЛЬ-ПРЕДМЕТНИК 2020 ГОДА»'));

if (!$showResult) {
    $lang = Yii::$app->language;

    echo $this->render("_form", [
        'form' => $form,
        'model' => $model,
    ]);

    echo $form->field($model, 'reCaptcha')->widget(
        \himiklab\yii2\recaptcha\ReCaptcha2::className(), []
    )->label(false);

    echo '<br>';
    echo Html::submitButton(Yii::t('main', 'Отправить'), [
        'class' => 'roundedDarkBtn'
    ]);
} else
    echo $this->render('_poolResult', [
        'data' => $data
    ]);

ActiveForm::end();
Pjax::end();

echo '<br>';

Modal::end();

$js = <<<JS
   $(document).ready(function() {
        $('#voteForm input').on('change', function() {
            if ($('input[name=\'VoteResult[first]\']:checked', '#voteForm').val() == 'g')
                $('#voteresult-first_comment').show();
            else 
                $('#voteresult-first_comment').hide();
        });
        
        $('#voteForm input').on('change', function() {
            if ($('input[name=\'VoteResult[second]\']:checked', '#voteForm').val() == 'd')
                $('#voteresult-second_comment').show();
            else 
                $('#voteresult-second_comment').hide();
        });
        
        $(document).on('pjax:send', function() {
          $('#loading').show();
        }).on('pjax:complete', function() {
          $('#loading').hide()
        })
   }); 
JS;
$this->registerJs($js);