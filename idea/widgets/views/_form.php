<?php

use yii\helpers\Html;

echo Html::tag('b', Yii::t('main', '1. Какие виды заданий, по вашему мнению, должны использоваться на конкурсе?'));
echo $form->field($model, 'first')
    ->radioList(
        [
            'a' => 'a) '. Yii::t('main', 'Открытый урок'),
            'b' => 'b) '. Yii::t('main', 'Онлайн-тесты'),
            'c' => 'c) '. Yii::t('main', 'Разработка урока'),
            'd' => 'd) '. Yii::t('main', 'Оценка педагогической деятельности через “Facebook”'),
            'e' => 'e) '. Yii::t('main', 'Презентация'),
            'f' => 'f) '. Yii::t('main', 'Оценка деятельности учителя (на основе документов, утверджающих его и достижения ученика в различных конкурсах)'),
            'g' => 'g) '. Yii::t('main', 'Ваше предложение'),
        ], [
            'item' => function ($index, $label, $name, $checked, $value) {
                return "
                    <label class='pure-material-radio'>
                        <input type='radio' name='{$name}' value='{$value}'>
                        <span>{$label}</span>
                    </label><br>
                ";
            }
        ]
    )->label(false);

echo $form->field($model, 'first_comment')->textarea([
    'maxlength' => true,
    'rows' => 2,
    'placeholder' => Yii::t('main', 'Опишите суть предложения'),
    'style' => 'margin-top: -20px;',
    'class' => '_inputtextbox form-control'
])->label(false);


echo Html::tag('b', Yii::t('main', '2. Сколько этапов проведения конкурса Вы рекомендуете?'));
echo $form->field($model, 'second')
    ->radioList(
        [
            'a' => 'a) '. Yii::t('main', '2 тура (районный, областной)'),
            'b' => 'b) '. Yii::t('main', '3 тура (школьный, районный, областной)'),
            'c' => 'c) '. Yii::t('main', '4 тура (школьный, районный, областной, республиканский)'),
            'd' => 'd) '. Yii::t('main', 'Ваше предложение'),
        ], [
            'item' => function ($index, $label, $name, $checked, $value) {
                return "
                    <label class='pure-material-radio'>
                        <input type='radio' name='{$name}' value='{$value}'>
                        <span>{$label}</span>
                    </label><br>
                ";
            }
        ]
    )->label(false);

echo $form->field($model, 'second_comment')->textarea([
    'maxlength' => true,
    'rows' => 2,
    'placeholder' => Yii::t('main', 'Опишите суть предложения'),
    'style' => 'margin-top: -20px;',
    'class' => '_inputtextbox form-control'
])->label(false);


echo Html::tag('b', Yii::t('main', '3. Какие у Вас имеются предложения для прозрачного и справедливого проведения конкурса?'));

echo $form->field($model, 'third_comment')->textarea([
    'rows' => 3,
    'placeholder' => Yii::t('main', 'Опишите суть предложения'),
])->label(false);

echo Html::tag('p', Yii::t('main', '<b>Примечание</b>: Три наиболее выбранных вариантов участников опроса (по вопросу №1), наиболее выбранных ответов (по вопросу №2) и наиболее предлагаемых предложений (по вопросу №3) будут включены в критерии отбора.'));