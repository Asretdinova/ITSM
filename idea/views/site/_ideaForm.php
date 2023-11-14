<?php

/**

 * Date: 8/23/19
 * Time: 1:03 AM
 */

use jlorente\remainingcharacters\RemainingCharacters;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model \idea\models\IdeaForm */
/* @var $form yii\widgets\ActiveForm */


//$js = <<<JS
//    $(document).on('pjax:send', function() {
//      $('#loading').show();
//    }).on('pjax:complete', function() {
//      $('#loading').hide()
//    })
//JS;
//
//$this->registerJs($js, \yii\web\View::POS_READY);
?>

<div class="feedback-form">
    <div id="loading" class="form_loading">
        <h1><?= Yii::t('main', 'Подождите пожалуйста') ?>...</h1>
    </div>

<!--    --><?php //Pjax::begin(['id' => 'feedback']) ?>
    <?php $form = ActiveForm::begin([
        'options' => [
//            'data-pjax' => true,
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <div class="fullWidth">
        <div class="formSection">
            <span>1</span>
            <p><?= Yii::t('main', 'Выбор направления') ?></p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
                    'data' => \common\models\Categories::fetchData(),
                    'options' => ['placeholder' => Yii::t('main', 'Выберите категорию')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]) ?>
            </div>
        </div>
    </div>

    <div class="fullWidth">
        <div class="formSection">
            <span>2</span>
            <p><?= Yii::t('main', 'Предложение') ?></p>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'title')->widget(RemainingCharacters::classname(), [
                            'type' => RemainingCharacters::INPUT_TEXT,
                            'text' => '{n} / 100',
                            'label' => [
                                'tag' => 'span',
                                'class' => 'counter',
                            ],
                            'options' => [
                                'maxlength' => true,
                            ]
                        ]) ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'text')->widget(RemainingCharacters::classname(), [
                    'type' => RemainingCharacters::INPUT_TEXTAREA,
                    'text' => '{n} / 700',
                    'label' => [
                        'tag' => 'span',
                        'class' => 'counter',
                    ],
                    'options' => [
                        'rows' => 8,
                        'maxlength' => true,
                        'placeholder' => Yii::t('main', 'Опишите суть Вашей идеи / предложения')
                    ]
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'implementation')->widget(RemainingCharacters::classname(), [
                    'type' => RemainingCharacters::INPUT_TEXTAREA,
                    'text' => '{n} / 700',
                    'label' => [
                        'tag' => 'span',
                        'class' => 'counter',
                    ],
                    'options' => [
                        'rows' => 8,
                        'maxlength' => true,
                        'placeholder' => Yii::t('main', 'Опишите суть Вашей идеи / предложения')
                    ]
                ]) ?>
            </div>

            <div class="col-md-12">
                <?= $form->field($model, 'expediency')->widget(RemainingCharacters::classname(), [
                    'type' => RemainingCharacters::INPUT_TEXTAREA,
                    'text' => '{n} / 700',
                    'label' => [
                        'tag' => 'span',
                        'class' => 'counter',
                    ],
                    'options' => [
                        'rows' => '6',
                        'maxlength' => true,
                        'placeholder' => Yii::t('main', 'Как, по-Вашему, можно реализовать предложенную идею / предложение')
                    ]
                ]) ?>
            </div>
        </div>
    </div>

    <div class="fullWidth">
        <div class="formSection">
            <span>3</span>
            <p><?= Yii::t('main', 'Прикрепление презентации') ?></p>
        </div>

        <div class="fileViewBox">
            <div class="item">
                <?= $form->field($model, 'presentation')->fileInput() ?>
                <span class="gray-text"><?= Yii::t('main', 'Файл до 15мб (.pptx, .ppt, .pdf)') ?></span>
            </div>

            <div class="item fileExampleBox">
                <img src="<?= Yii::getAlias("@web/img/file_example.png") ?>">
                <a href="<?= Yii::getAlias("@web/examples/presentation_". Yii::$app->language .".pptx")?>"><?= Yii::t('main', 'Образец оформления презентации') ?></a>
            </div>
        </div>
    </div>

    <div class="fullWidth">
        <div class="formSection">
            <span>4</span>
            <p><?= Yii::t('main', 'Данные о заявителе') ?></p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'author_name')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'author_surname')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
                    'mask' => '+\9\98 99 999-99-99',
                ]) ?>
            </div>

            <div class="col-md-6">
            </div>

            <div class="col-md-6">
                <div class="col-md-6">
                    <?= $form->field($model, 'accept_participating')->checkbox([]) ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'accept_publishing')->checkbox([]) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 accented">
            <div class="offer_box">
                <?= \common\models\Pages::getContent('public_offer') ?>
            </div>

            <?= $form->field($model, 'agreement')->checkbox([]) ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'reCaptcha')->widget(
                \himiklab\yii2\recaptcha\ReCaptcha2::className(), []
            )->label(false) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Подать идею'), [
            'class' => 'form_send_btn'
        ]) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
<?php //Pjax::end(); ?>
