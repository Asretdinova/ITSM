<?php

/* @var \yii\web\View $this */

/* @var \common\models\Departments[] $model */

use yii\helpers\Html;

$this->title = Yii::t('main', 'Наша команда');
$this->params['breadcrumbs'][] = $this->title;

echo Html::tag('h1', $this->title, [
    'class' => 'title'
]);

foreach ($model as $department) {
    echo Html::beginTag('div', ['class' => 'departmentsItem']);

    echo Html::beginTag('div', ['class' => 'departmentsHeader']);

    echo Html::img(Yii::getAlias("@web/uploads/content/{$department->icon}"));
    echo Html::a($department->title, ['team/department', 'id' =>  $department->id]);
    //    echo Html::tag('span', $department->title);
    echo Html::endTag('div');

    echo Html::beginTag('div', ['class' => 'departmentMembers']);
    $isFirst = true;
    $membersHtml = '';
    foreach ($department->members as $item) {
        $image = Html::img(Yii::getAlias("@web/uploads/content/{$item->photo}.jpg"));
        if (empty($item->photo)) {
            $image = Html::tag('div', Yii::t('main', 'Вакант'), [
                'class' => 'vacancy_box'
            ]);
        }

        if ($isFirst && !empty($item->photo)) {
            echo "
                <div class='headItem ' style='text-align:center;'>
                    {$image} ";

            if (strpos($department->title_ru, "Управление")!== false) {

                echo "
                        <span>" . Yii::t('main', 'Начальник управления') . "</span>";
            } elseif (strpos($department->title_ru, "Отдел")!== false) {
                echo "
                        <span>" . Yii::t('main', 'Начальник отдела') . "</span>";
            }
            echo "
                            <h1>{$item->name}</h1>
                            ";
            if (!empty($item->phone) && !empty($item->mail)) {
                echo " <div class='details'>
                    <div class='info' style='padding-top:1rem;'>
                    <p><i style='color:orange;' class='fas fa-phone-alt'></i> {$item->phone}</p>
                    <p><i style='color:orange;' class='fas fa-at'></i> <a href='mailto:{$item->mail}'>{$item->mail}</a></p>
                    </div>
                    </div>";
            }
            echo "

                </div>
            ";
        } else {
            if (!$isFirst) {
                $membersHtml .= "
                <div class='item'>
                    {$image}
                    <p>{$item->name}</p>
                </div>
            ";
            }
        }
        $isFirst = false;
    }

    echo Html::tag('div', $membersHtml, ['class' => 'membersList']);
    echo Html::endTag('div');

    echo Html::endTag('div');
}
