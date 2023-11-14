<?php

/**

 * Date: 8/30/19
 * Time: 7:00 AM
 */

/* @var $this \yii\web\View */

use common\models\Ideas;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$js = <<<JS
    $('#searchForm input[type="radio"]').change(function(){
        $(this).submit();
    });
JS;
$this->registerJs($js, \yii\web\View::POS_READY);

?>

<div class="search-content">

    <?php $form = ActiveForm::begin([
        'action' => ['view', 'id' => $id],
        'method' => 'get',
        'options' => [
            'id' => 'searchForm',
        ]
    ]); ?>

    <div class="searchItems">
        <div class="item">
            <div class="searchBox">
                <?= $form->field($model, 'title')->textInput(['class' => 'searchBar', 'placeholder' => Yii::t('main', 'Поиск')])->label(false) ?>
                <?= Html::submitButton('<i class="icon fas fa-search"></i>', ['class' => 'searchBtn']) ?>
            </div>
        </div>

        <div class="item">
            <?= $form->field($model, 'status')->widget(Select2::className(), [
                'data' => [
                    0 => Yii::t('main', 'Все идеи'),
                    Ideas::STATUS_PROCESS => Yii::t('main', 'В рассмотрении'),
                    Ideas::STATUS_PUBLISHED => Yii::t('main', 'Принятые'),
                    Ideas::STATUS_REJECTED => Yii::t('main', 'Отклоненные'),
                ],
                'options' => ['placeholder' => Yii::t('main', 'Все идеи')],
                'hideSearch' => true,
            ])->label(Yii::t('main', 'Показать')) ?>
        </div>

        <div class="item">
            <?= $form->field($model, 'sort')->widget(Select2::className(), [
                'data' => [
                    'date' => Yii::t('main', 'По дате размещения'),
                    'popularity' => Yii::t('main', 'По популярности'),
                ],
                'options' => ['placeholder' => Yii::t('main', 'По дате размещения')],
                'hideSearch' => true,
            ])->label(Yii::t('main', 'Фильтровать')) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<<JS
    $(document).ready(function() {
        $('#searchForm select').change(function() {
            $('#searchForm').submit();
        });
    });
JS;

$this->registerJs($js);

?>
