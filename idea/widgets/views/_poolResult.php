<?php

/**

 * Date: 1/5/20
 * Time: 7:54 AM
 */

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $data array */

echo Html::beginTag('div', ['class' => 'voteResults']);
echo Html::tag('b', Yii::t('main', '1. Какие виды заданий, по вашему мнению, должны использоваться на конкурсе?'));
$result = [
    [
        ['var_label' => 'a', 'label' => Yii::t('main', 'Открытый урок')],
        ['var_label' => 'b', 'label' => Yii::t('main', 'Онлайн-тесты')],
        ['var_label' => 'c', 'label' => Yii::t('main', 'Разработка урока')],
        ['var_label' => 'd', 'label' => Yii::t('main', 'Оценка педагогической деятельности через “Facebook”')],
        ['var_label' => 'e', 'label' => Yii::t('main', 'Презентация')],
        ['var_label' => 'f', 'label' => Yii::t('main', 'Оценка деятельности учителя (на основе документов, утверджающих его и достижения ученика в различных конкурсах)')],
        ['var_label' => 'g', 'label' => Yii::t('main', 'Ваше предложение')],
    ], [
        ['var_label' => 'a', 'label' => Yii::t('main', '2 тура (районный, областной)')],
        ['var_label' => 'b', 'label' => Yii::t('main', '3 тура (школьный, районный, областной)')],
        ['var_label' => 'c', 'label' => Yii::t('main', '4 тура (школьный, районный, областной, республиканский)')],
        ['var_label' => 'd', 'label' => Yii::t('main', 'Ваше предложение')],
    ]
];
foreach ($result[0] as $item) {
    $percent = isset($data[0][$item['var_label']]) ? $data[0][$item['var_label']] : 0;
    echo "
        <div class='block' data-toggle='tooltip' data-placement='bottom' title='{$item['label']}'>
            <span>{$item['var_label']})</span> 
            <span class='vLabel'>{$percent}%</span>
            <div class='progress'>
              <div class='progress-bar' role='progressbar' aria-valuenow='{$percent}' aria-valuemin='0' aria-valuemax='100' style='width: {$percent}%;'></div>
            </div>
        </div>
    ";
}

echo Html::tag('b', Yii::t('main', '2. Сколько этапов проведения конкурса Вы рекомендуете?'));

foreach ($result[1] as $item) {
    $percent = isset($data[1][$item['var_label']]) ? $data[1][$item['var_label']] : 0;
    echo "
        <div class='block' data-toggle='tooltip' data-placement='bottom' title='{$item['label']}'>
            <span>{$item['var_label']})</span> 
            <span class='vLabel'>{$percent}%</span>
            <div class='progress'>
              <div class='progress-bar' role='progressbar' aria-valuenow='{$percent}' aria-valuemin='0' aria-valuemax='100' style='width: {$percent}%;'></div>
            </div>
        </div>
    ";
}

echo Html::endTag('div');

$js = <<<JS
    $(document).ready(function() {
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    });
JS;
$this->registerJs($js);
